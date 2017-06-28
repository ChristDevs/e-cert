<?php

namespace App\Http\Controllers;

use DB;
use App\Entities\Person;
use App\Traits\Updatable;
use App\Entities\Certificate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MarriageCertificateRequest;

class MarriageCertificateController extends Controller
{
    use Updatable;

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
        $certs = $this->cert->where('type', 'marriage')->get();
        if (auth()->user()->hasRole('user')) {
            $certs = auth()->user()->certs->where('type', 'birth')->all();
        }

        return view('certificates.marriage.index', compact('certs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // do checks here
        return view('certificates.marriage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(MarriageCertificateRequest $request): RedirectResponse
    {
        extract($this->buildValuesFromRequest($request));
        $groomEntity = $this->people->updateOrCreate(['id_no' => $groom['id_no']], $groom);
        $brideEntity = $this->people->updateOrCreate(['id_no' => $bride['id_no']], $bride);
        if ($groomEntity->marital_status == 'married' || $brideEntity->marital_status == 'married') {
            $request->session()->flash('messages', ['type' => 'danger', 'title' => 'Whoops Certicate request submission failed!!', 'message' => ' It seems one or both of the couple is already married, if this is not true contact the system administrator']);

            return back()->withInput();
        }
        DB::transaction(function () use ($brideEntity, $groomEntity, $witnesses, $request) {
            $cert = $this->cert->create([
                        'notes' => $request->get('notes'),
                        'created_by' => $request->user()->id,
                        'type' => 'marriage',
                        'overseen_by' => $request->get('overseen_by'),
                        'status' => 'pending',
                        'serial_number' => 0,
                        'groom_id' => $groomEntity->id,
                        'bride_id' => $brideEntity->id,
                    ]);
            foreach ($witnesses as $witness) {
                $cert->witnesses()->create($witness);
            }
            $brideEntity->marital_status = 'married';
            $groomEntity->marital_status = 'married';
            $groomEntity->save();
            $brideEntity->save();
        });
        $request->session()->flash('messages', ['type' => 'success', 'title' => 'Success !! Application was submited', 'message' => "Your Apllication for marriage certificate for $brideEntity->fullname and $groomEntity->fullname was successful. You will be notified once approved"]);
        return redirect()->route('marriage.index');
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
         $cert = $this->cert->findOrFail($id);

        return view('certificates.marriage.process', compact('cert'));
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

    /**
     * Build array values from request to match model attributes.
     *
     * @param Request $request
     *
     * @return array
     **/
    protected function buildValuesFromRequest($request): array
    {
        $bride = [];
        $groom = [];
        $witnesses = [];
        foreach ($request->all() as $key => $value) {
            if (starts_with($key, 'groom_')) {
                $groom[str_replace('groom_', '', $key)] = $value;
            }
            if (starts_with($key, 'bride_')) {
                $bride[str_replace('bride_', '', $key)] = $value;
            }
            if (starts_with($key, 'witness')) {
                for ($i = 1; $i <= 5; ++$i) {
                    if (starts_with($key, "witness{$i}_")) {
                        $witnesses[$i][str_replace("witness{$i}_", '', $key)] = $value;
                    }
                }
            }
        }

        return compact('bride', 'witnesses', 'groom');
    }
}
