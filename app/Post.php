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

        $slug = 
        URLify::filter($title);
        
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
         
         array_pop($summary);
         
         return implode (" ", $summary). "...</p>";
    
    }
     
}
