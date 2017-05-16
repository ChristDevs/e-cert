<?php

namespace App\Http\Controllers;

use App\Entities\Person;
use App\Support\FileUpload;
use Illuminate\Http\Request;
use App\Entities\Certificate;
use App\Http\Requests\BirthCertificateRequest;

class BirthCertificateController extends Controller
{
    use FileUpload;
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
    public function index()
    {
        $certs = $this->cert->all();

        return view('certificates.birth.index', compact('certs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.birth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BirthCertificateRequest $request)
    {
        $notes = $request->has('notes') ? $request->get('notes') : '';
        $person = $this->people->create($request->input());
        $cert = $person->certificates()->create(['notes' => $notes, 'created_by' => $request->user()->id, 'type' => 'birth', 'overseen_by' => $request->get('overseen_by')]);
        $this->upload($request, $cert);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
