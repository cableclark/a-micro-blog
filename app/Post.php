<?php

namespace App;

use URLify;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function makeSlug (string $title) {

        $slug = 
        URLify::filter($title);
        
        return  $slug;
    }

     
}
