<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageRequest;

class ImagesController extends Controller
{
    //

    public function __construct () {

        $this->middleware("auth")->except(['getImages']);

    } 

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $images = Image::orderBy("created_at", "DESC")->get();
        
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
    /**
     * Save the specified resource.
     *
     * @param  ImageRequest $request
     * @return \Illuminate\Http\Response
     */  

    public function save (ImageRequest $request)
    {           
            $image = new Image();

            $path = $request->file('image')->store("public/images");
            
            $image->name= $request->input('name');

            $image->description= $request->input('decription');
            
            $image->filename =  str_replace('images/',"",$path);

            $image->path = str_replace("public/","",$path); 

            $image->save();
            
            return redirect("/admin/image");
    }

    public function destroy($id)
    {
        $image = Image::where('id', $id)->first();

        Storage::delete( "images/" .  $image->filename);

        $image->delete();

        return redirect("/admin/image");;
    }
    
    public function getImages () {

        return $images = Image::all();

    }

}
