<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{


    public function __construct () {

        $this->middleware("auth")->except(["index", "show"]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all()->sortByDesc("created_at");;
       
        return view('posts.index')->with('posts', $posts);
    }
 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        
        $post = Post::where("slug", $slug)->first();
        
        
        return view('posts.single')->with('post', $post);
    }


        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
        
        return view("admin.post.create");
    }


    public function save (PostRequest $request)
    {           
            
            $post = new Post;
            
            $post->title= $request->input('title');

            $post->body= $request->input('body');

            $post->slug = $post->makeSlug($request->input('title'));

            $post->published = $request->input('published');
             
            $post->save();
            
            return redirect("/");
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        
        return view ("admin.post.edit")->with('post', $post);
    }

    public function update(PostRequest $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();
         
        $post->title= $request->input('title');
        
        $post->body= $request->input('body');

        $post->slug = $post->makeSlug($request->input('title'));
        
        $post->published = $request->input('published');
             
        $post->save();
        
        return redirect("admin");
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();

        $post->delete();

        return redirect("admin");;
    }


}
