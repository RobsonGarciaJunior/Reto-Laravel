<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::all();
        return view('states.index', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('states.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $state = new State();
        $state->name = $request->name;
        $state->save();
        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {
        return view('states.show', ['state' => $state]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        return view('states.edit', ['state' => $state]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, State $state)
    {
        $state->name = $request->name;
        $state->save();
        return view('states.show', ['state' => $state]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('success','State deleted successfully');
    }
}
