<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    //
    /**
     * Post a comment for review.
     *
     * @return void
     */

    public function save (Request $request) {


            $comment = new Comment;

            $comment->post_id = $request->input('post_id');
            
            $comment->email = $request->input('email');
            
            $comment->comment = $request->input('body');   
            
            $comment->save();

            return  redirect()->back()->withErrors(['msg'=>'Your comment has been sent']);

    }
}
