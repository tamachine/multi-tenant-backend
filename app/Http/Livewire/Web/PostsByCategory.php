<?php

namespace App\Http\Livewire\Web;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\BlogCategory;

class PostsByCategory extends Component
{
    use WithPagination;

    const CATEGORIES_PER_PAGE = 2;
 
    public function render()
    {
        return view('livewire.web.posts-by-category', [
            'categoriesWithPosts' => BlogCategory::has('postsPublished')->paginate(SELF::CATEGORIES_PER_PAGE)
        ]);
    }
}