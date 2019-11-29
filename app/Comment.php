<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
     /**
     * Get the post the comment belongs to .
     */
    public function posts () {

        $this->belomgsTo("App\Post");

    }
}
