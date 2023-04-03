<?php

namespace App\Models;

use DB;

class BlogTagColor
{
    protected $backgrounds  = ['#EEF8FD', '#EEFDF0', '#FDEEF4', '#F9EEFD', '#EEFDFD', '#FDFCEE']; //if adding colors here, you must add them as well to tailwind.config.js file in safelist array
    protected $hovers       = ['#d1ecfa', '#d1fad7', '#fad1e1', '#efd1fa', '#d1fafa', '#faf7d1']; //if adding colors here, you must add them as well to tailwind.config.js file in safelist array
       
    public $background;
    public $hover;

    //get BlogTagColor object
    public function getBlogTagColor($colorId) {
        $blogTagColor = new BlogTagColor();

        $blogTagColor->background = $this->backgrounds[$colorId];
        $blogTagColor->hover = $this->hovers[$colorId];

        return $blogTagColor;
    }

    /** get the next available color id to be assigned */
    public function getColorId() {

        //get current number of times that a color has been assigned to a Tag
        $colors = DB::table('blog_tags')
        ->select('color_id', DB::raw('count(*) as total'))
        ->groupBy('color_id')      
        ->get();

        //init the times to 0
        $times = array_fill(0, count($this->backgrounds), 0);
 
        //assign to each time, its corresponding number of times that it has been assigned to a Tag
        foreach($colors as $color) {
            $times[$color->color_id] = $color->total;
        }

        //sort the array by the times asc
        arsort($times);
        
        //get the color that has been assigned less times
        return array_keys($times, min($times))[0];
    }
}