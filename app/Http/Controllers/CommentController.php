<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Creator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    // public function store(Request $request, Creator $creator)
    // {
    //     $validated = request()->validate(['content' => 'required|string']);

    //     $comment = new Comment();
    //     $comment->content = $validated['content'];
    //     $comment->creator_id = $creator->id;
    //     $comment->user_id = Auth::id();
    //     $comment->place_id = $creator->place_id; // Добавить эту строку
    //     $comment->save();

    //     return redirect()->back()->with('success', 'Comment added successfully!');
    // }
    public function store(Request $request, Creator $creator)
{
    $request->validate([
        'content' => 'required|string|max:1000',
        'parent_id' => 'nullable|exists:comments,id'
    ]);

    $comment = new Comment();
    $comment->content = $request->content;
    $comment->user_id = auth()->id();
    $comment->creator_id = $creator->id;
    $comment->parent_id = $request->parent_id;
    
    // Если нужно наследовать place_id от creator
    if ($creator->place_id) {
        $comment->place_id = $creator->place_id;
    }
    
    $comment->save();

    return redirect()->back()->with('success', 'Comment added successfully!');
}
    /**
     * Remove the specified comment from storage.
     */
    public function destroy(Comment $comment)
    {
        // Check if the user is authorized to delete this comment
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
