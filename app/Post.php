<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function makeSlug (string $title) {
     
        $slug =  mb_strtolower(preg_replace('/[^\w_]+/u', '-', $title));
        
        return  $slug;
    }

     
}
