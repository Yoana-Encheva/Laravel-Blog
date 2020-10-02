<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {

        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|min:5|max:2000',
        ));

        $post = Posts::findOrFail($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->body = $request->body;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        // Session::flash('success', 'Comment was added');

        return back();
    }
}
