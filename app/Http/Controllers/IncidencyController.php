<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Incidency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncidencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencies = Incidency::all();
        return view('incidencies.index', ['incidencies' => $incidencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('incidencies.create', ['categories' => $categories, 'departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidency = new Incidency();
        $incidency->title = $request->title;
        $incidency->text = $request->text;
        $incidency->estimatedTime = $request->estimatedTime;
        $incidency->categoryId = $request->categoryId;
        $incidency->departmentId = $request->departmentId;
        $incidency->userId = Auth::user()->id;

        $incidency->save();
        return redirect()->route('incidencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidency $incidency)
    {
        return view('incidencies.show', ['incidency' => $incidency]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidency $incidency)
    {
        $categories = Category::all();
        $departments = Department::all();
        return view('incidencies.edit', ['incidency' => $incidency,'categories' => $categories,'departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidency $incidency)
    {
        $incidency->title = $request->title;
        $incidency->text = $request->text;
        $incidency->estimatedTime = $request->estimatedTime;
        $incidency->categoryId = $request->categoryId;
        $incidency->incidencyId = $request->incidencyId;
        $incidency->userId = $request->userId;
        $incidency->save();
        return view('incidencies.show', ['incidency' => $incidency]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidency $incidency)
    {
        $incidency->delete();
        return redirect()->route('incidencies.index')->with('success', 'Incidency deleted successfully');
    }
}
