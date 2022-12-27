<?php

namespace App\Models;

class CarCategory {

    public $text;
    public $imagePath;    

    public static function all() {
        $all = [];

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/small-medium.png');
        $category->text = 'Small - Medium';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/large.png');
        $category->text = 'Large';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/4x4.png');
        $category->text = '4x4';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/premium.png');
        $category->text = 'Premium';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/minivans.png');
        $category->text = 'Mini vans';
        
        $all[] = $category;

        return $all;
    }


}
