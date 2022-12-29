<?php

namespace App\Models;

class CarCategory {

    public $text;
    public $imagePath;    
    public $id;

    public static function all() {
        $all = [];

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/small-medium.png');
        $category->text = 'Small - Medium';
        $category->id = 'medium';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/large.png');
        $category->text = 'Large';
        $category->id = 'large';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/4x4.png');
        $category->text = '4x4';
        $category->id = '4x4';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/premium.png');
        $category->text = 'Premium';
        $category->id = 'premium';
        
        $all[] = $category;

        $category = new CarCategory();
        $category->imagePath = asset('images/cars/categories/minivans.png');
        $category->text = 'Mini vans';
        $category->id = 'minivans';
        
        $all[] = $category;

        return $all;
    }


}
