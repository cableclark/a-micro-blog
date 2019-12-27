<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class CommentsController extends Controller
{
    //
    /**
     * Post a comment for review.
     *
     * @return void
     */

    public function save (CommentRequest $request) {


            $comment = new Comment;

            $comment->post_id = $request->input('post_id');

            $comment->name = $request->input('name');

            $comment->title = $request->input('title');
            
            $comment->email = $request->input('email');
            
            $comment->comment = clean($request->input('body'));   
            
            $comment->save();

            Mail::to("elenavselena@gmail.com")->send(new UserRegistered());

            return  redirect()->back()->withErrors(['msg'=>'Your comment has been sent']);

    }
}
