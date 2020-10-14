<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {

        $this->validate($request, array(
            'body' => 'required|min:5|max:2000',
        ));

        $post = Posts::findOrFail($post_id);
        $user = User::findOrFail(auth()->id());

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->body = $request->body;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        // Session::flash('success', 'Comment was added');

        return back();
    }
}
