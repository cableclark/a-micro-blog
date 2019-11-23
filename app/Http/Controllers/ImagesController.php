<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImagesController extends Controller
{
    //

    public function __construct () {

        $this->middleware("auth");
    } 

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::all();
        
        return view('admin.images.index')->with('images', $images);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
    
        return view("admin.images.create");
    }


    public function save (Request $request)
    {           
            
            $image = new Image();

            $path = $request->file('image')->store("images");

            $image->name= $request->input('name');

            $image->description= $request->input('decription');

            $image->path = $path; 

            $image->save();
            
            return redirect("/");
    }

 

}
