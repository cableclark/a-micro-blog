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
      

        $posts = Post::published()->orderBy("created_at", "DESC")->get();

        $firstPost= $posts[0];
        
        $posts->forget(0);

        
        return view('posts.index')->with(
            ['firstPost'=> $firstPost, 
            'posts'=>$posts]);

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
            
            if ($request->file('image')) {
    
                $path = $request->file('image')->store("public/featured_images");
                
                $post->featured_image = str_replace("public/","",$path);
            }
             
            $post->save();
            
            return redirect("/admin");

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

        if ($request->file('image')) {
    
            $path = $request->file('image')->store("public/featured_images");
                
            $post->featured_image = str_replace("public/","",$path);
        }
        
             
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
