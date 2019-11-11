<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class DashboardController extends Controller
{
    //
      
    public function __construct () {

        $this->middleware("auth");
    } 

    public function index()
    {
        
        $posts = Post::all()->sortByDesc("created_at");;
       
        return view('admin.dashboard')->with('posts', $posts);
    }
}
