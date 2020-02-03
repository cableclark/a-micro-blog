<?php

namespace App;

use URLify;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Make slug from the title.
     *
     * @return string
     */

    public function makeSlug (string $title) {

        $slug = URLify::filter($title);
        
        return  $slug;
    }

      /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopePublished($query)
    {
        return $query->where('published', 1);
    }

 

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getSummaryAttribute()
    {
         $summary = array_slice(explode(" ", $this->body), 0, 100);
         
         $summary[count($summary)-1] = strip_tags($summary[count($summary)-1], '</p>') ;
        
         return implode (" ", $summary). "...</p>";
    
    }

     /**
     * Get the comments for the blog post.
     */

    public function comments () {

        return $this->hasMany('App\Comment');
    }
      
}
