<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{


    public function __construct () {

        $this->middleware("auth")->except(["index", "show", "getPosts", "ajaxPosts"]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('posts.index');
    }


    
     public function getPosts ()
     {

        $posts = Post::published()->orderBy("created_at", "DESC")->limit(7)->get();

        $firstPost= $posts[0];
        
        $posts->forget(0);

        return  [
            'firstPost'=> $firstPost, 
            'posts'=>$posts
            ];
     }   


     public function  ajaxPosts ($page)

      {

        $posts =  DB::table('posts')->select('id', 'title', 'tumbnail', 'slug', 'created_at')->orderBy("created_at", "DESC")->skip($page)->take(2)->get();


        return  [
            'posts'=>$posts
            ];
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

            $deletedImage = "public/" . $post->featured_image;
            
            $deletedThumbnail= "public/" . $post->tumbnail;

            Storage::delete([$deletedImage, $deletedThumbnail]);

            $path = $request->file('image')->store("/public/featured_images");

            $image = Image::make($request->file('image'))->fit(300)->encode('jpg');

            //Provide own name
            $name = "public/featured_images/thumb_" . str_replace("public/featured_images","", $path); ;
            
            //Put file with own name
            Storage::put($name, $image);
          
            $post->featured_image = str_replace("public/","",$path);

            $post->tumbnail = str_replace("public/","",$name);
        
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
