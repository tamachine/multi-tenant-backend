<?php

namespace App\View\Components\Admin;

use App\Models\BlogPost;
use App\Services\PostPreview\PostPreviewToken;
use App\Services\PostPreview\PostPreviewUrl;
use Illuminate\View\Component;

class PostPreviewButton extends Component
{
    public $token;

    public $url;

    public $showButton = true;

    public $envVarName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(BlogPost $post, PostPreviewUrl $postPreviewUrl)
    {        
        if($postPreviewUrl->envVarIsSet()) {
            $this->url = $postPreviewUrl->url($post);
        } else {
            $this->showButton = false;
        }             

        $this->envVarName =$postPreviewUrl->getEnvVarName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.post-preview-button');
    }
}
