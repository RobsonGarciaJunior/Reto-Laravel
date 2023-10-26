<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Incidency;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->usedTime = $request->usedTime;
        $comment->save();

        $incidency = Incidency::find($request->incidency_id);
        $comments = Comment::all();
        return redirect()->route('comments.index', ['comments' => $comments]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->text = $request->text;
        $comment->usedTime = $request->usedTime;
        $comment->save();

        $incidency = Incidency::find($request->incidency_id);
        return view('incidencies.show', ['incidency' => $incidency]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $incidency = Incidency::find($comment->incidency_id);
        $comment->delete();
        //TODO MIRAR QUE OCURRE Y PQ AL BORRAR ME DA ERROR AL VOLVER A LA INCIDENCIA
        return redirect()->route('incidencies.show', ['incidency' => $incidency])->with('success', 'Comment deleted successfully');
    }
}
