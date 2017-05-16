<?php

namespace App\Http\Controllers;

use App\Entities\Person;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;

class PeopleController extends Controller
{
    /**
     * Create a new Controller instance.
     *
     * @param Person $people
     */
    public function __construct(Person $people)
    {
        $this->people = $people;
    }

    /**
     * Display a listing of all people.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = $this->people->all();

        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $person = $this->people->create($request->all());

        return redirectWithInfo(route('people.index'), "Profile for {$person->fullname} was created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param Person $person Bound model
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return view('people.show', compact('person'));
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
    public function destroy(Person $person)
    {
        $person->delete();

        return withInfo();
    }
}
