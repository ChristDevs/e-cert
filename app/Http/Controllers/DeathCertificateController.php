<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\DeathCertRequest;

class DeathCertificateController extends CertificateController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certs = $this->getCertificates('death');

        return view('certificates.death.index', compact('certs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificates.death.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DeathCertRequest $request)
    {
        DB::transaction(function () use ($request) {
            $person = $this->people->updateOrCreate(['id_no' => $request->get('id_no')], $request->input());
            $cert = $person->certificates()->create(array_merge(
                [
                'created_by' => $request->user()->id,
                'type' => 'death',
                'status' => 'pending',
                ],
                $request->only('event_location', 'overseen_by')
                )
            );
            $person->alive = false;
            $person->save();
            $this->created($cert);
        });

        return redirect()->route('death.index');
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
            return view('certificates.death.view', compact('cert'));
        }
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

        return view('certificates.death.process', compact('cert'));
    }
}
