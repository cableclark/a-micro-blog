<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    

    public function image ( ) {
        $this->hasMany(App/Images);
    }

    public function makeSlug (string $title) {
     
        $slug =  strtolower(preg_replace('/[^a-z\d]+/i', '-', $title));
        
        return  $slug;
    }

     
}
