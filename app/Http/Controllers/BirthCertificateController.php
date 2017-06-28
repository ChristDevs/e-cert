<?php

namespace App\Http\Controllers;

use App\Traits\Updatable;
use App\Entities\Person;
use App\Support\FileUpload;
use App\Entities\Certificate;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BirthCertificateRequest;

class BirthCertificateController extends Controller
{
    use FileUpload, Updatable;
    /**
     * Certificate model instance.
     *
     * @var mixed
     **/
    protected $cert;
    /**
     * Person model instance.
     *
     * @var mixed
     **/
    protected $people;

    /**
     * Create a new controller instance.
     *
     * @param Certificate $cert
     * @param Person      $people
     **/
    public function __construct(Certificate $cert, Person $people)
    {
        $this->middleware('auth');
        $this->cert = $cert;
        $this->people = $people;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $certs = $this->cert->where('type', 'birth')->get();
        if (auth()->user()->hasRole('user')) {
            $certs = auth()->user()->certs->where('type', 'birth')->all();
        }

        return view('certificates.birth.index', compact('certs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('certificates.birth.create');
    }

    /**
     * Show the form for creating a new certificate.
     *
     * @return \Illuminate\Http\Response
     */
    public function createFromInstance(Person $person): View
    {
        return view('certificates.birth.CreateForExisting', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BirthCertificateRequest $request): RedirectResponse
    {
        $notes = $request->has('notes') ? $request->get('notes') : '';
        $person = $this->people->create($request->input());
        $cert = $person->certificates()->create(['notes' => $notes, 'created_by' => $request->user()->id, 'type' => 'birth', 'overseen_by' => $request->get('overseen_by'), 'status' => 'pending', 'serial_number' => 0]);

        $this->upload($request, $cert);
        $request->session()->flash('messages', ['type' => 'success', 'title' => 'Success !! Apllication submited', 'message' => "Your Apllication for birth certificate for $person->fullname was successful. You will be notified once approved"]);
        return redirectWithInfo(route('birth.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cert = $this->cert->findOrFail($id);
        if ($cert->approved) {
            return view('certificates.birth.view', compact('cert'));
        }

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $cert = $this->cert->findOrFail($id);

        return view('certificates.partials.process-certificate', compact('cert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function createFromExisting(Person $person, BirthCertificateRequest $request): RedirectResponse
    {
        $notes = $request->has('notes') ? $request->get('notes') : '';
        $person->update($request->input());
        $cert = $person->certificates()->create(['notes' => $notes, 'created_by' => $request->user()->id, 'type' => 'birth', 'overseen_by' => $request->get('overseen_by'), 'status' => 'pending', 'serial_number' => 0]);
        $this->upload($request, $cert);

        return redirectWithInfo(route('birth.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        $this->cert->destroy($id);

        return redirectWithInfo(route('birth.index'));
    }

    /**
     * Display the file attachments.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function attachments(Certificate $cert): View
    {
        return view('certificates.modals.files', compact('cert'));
    }
}
