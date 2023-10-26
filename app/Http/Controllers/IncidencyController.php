<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
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
        $incidencies = Incidency::orderBy('created_at', 'desc')->get();
        return view('incidencies.index', ['incidencies' => $incidencies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('incidencies.create', ['categories' => $categories]);
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
        $incidency->departmentId = Auth::user()->departmentId;
        $incidency->userId = Auth::user()->id;

        $incidency->save();
        return redirect()->route('incidencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidency $incidency)
    {
        $comments = Comment::where('incidencyId', $incidency->id)->get();
        return view('incidencies.show', ['incidency' => $incidency, 'comments'=> $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidency $incidency)
    {
        $categories = Category::all();
        return view('incidencies.edit', ['incidency' => $incidency,'categories' => $categories]);
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
        $incidency->departmentId = Auth::user()->departmentId;
        $incidency->userId = Auth::user()->id;
        $incidency->save();
        
        $comments = Comment::where('incidencyId', $incidency->id)->get();
        return view('incidencies.show', ['incidency' => $incidency, 'comments'=> $comments]);
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
