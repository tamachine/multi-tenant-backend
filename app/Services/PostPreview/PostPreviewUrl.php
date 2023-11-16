<?php

namespace App\Services\PostPreview;

use App\Models\BlogPost;

/**
 * This class generates the url to be used by the post preview button
 */
class PostPreviewUrl {

    protected $domain;

    protected $token;

    protected $postPreviewToken;
    
    public function __construct(PostPreviewToken $postPreviewToken) {
        $this->postPreviewToken = $postPreviewToken;

        $this->setDomain();
        $this->setToken();        
    }

    /**
     * returns the url to be used by the post preview button
     * @return string 'website-domain/{post->slug}?token={currentUser->token}'
     */
    public function url(BlogPost $post):string {
        return $this->domain . "/" . $post->slug . "?token=". $this->token;
    }   
    
    /**
     * Returns the env variable name where the preview url must be stored
     */
    public function getEnvVarName():string {
        return 'POST_PREVIEW_URL';
    }

    /**
     * Checks if the corresponding env var is set
     */
    public function envVarIsSet(): bool {
        return (bool)env($this->getEnvVarName());
    }

    /**
     * Sets the domain of the url accordin to the env variable
     */
    protected function setDomain() {        
        $this->domain = env($this->getEnvVarName()); 
    }

    /**
     * Sets the token for the current user
     */
    protected function setToken() {
        $this->postPreviewToken->generate();

        $this->token = $this->postPreviewToken->getTokenPlainText();
    }
}