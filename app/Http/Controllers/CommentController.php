<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Incidency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $comment->incidencyId = $request->incidencyId;
        $comment->userId = Auth::user()->id;
        $comment->save();

        $incidency = Incidency::find($request->incidencyId);
        $comments = Comment::where('incidencyId', $request->incidencyId)->get();
        return redirect()->route('incidencies.show', ['incidency' => $incidency, 'comments'=> $comments]);
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

        $incidency = Incidency::find($comment->incidencyId);
        $comments = Comment::where('incidencyId', $incidency->id)->get();
        return view('incidencies.show', ['incidency' => $incidency, 'comments'=> $comments]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $incidency = Incidency::find($comment->incidencyId);
        $comments = Comment::where('incidencyId', $comment->incidencyId)->get();
        $comment->delete();   
        return redirect()->route('incidencies.show', ['incidency' => $incidency, 'comments'=> $comments])->with('success', 'Comment deleted successfully');
    }
}
