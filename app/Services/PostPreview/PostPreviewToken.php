<?php

namespace App\Services\PostPreview;

/**
 * This class deletes all the tokens for the current user and creates a new one to be used in the post preview button
 */
class PostPreviewToken {

    const TOKEN_NAME = 'post-preview-button';

    protected $user;

    protected $token;

    public function __construct() {
        $this->user = auth()->user();
    }

    /**
     * Generates a token for the current user
     * Deletes all the other ones (only the post-preview-button ones)
     */
    public function generate() {
        $this->delete();
        $this->create();
    }

    /**
     * Returns the token plain text
     * It is only available just after of the token creation
     * @return string the plain text token
     */
    public function getTokenPlainText(): string {
        return $this->token->plainTextToken;
    }

    /**
     * Deletes all the post-preview-button tokens for the current user
     */
    protected function delete() {
        $this->user->deleteTokens(self::TOKEN_NAME);
    }

    /**
     * Creates a new token for the current user
     */
    protected function create() {
        $this->token = $this->user->createToken(self::TOKEN_NAME);

        $this->setExpiryTime();        
    }

    /**
     * Sets a expiration time for the created token
     */
    protected function setExpiryTime() {
        $tokenModel = $this->token->accessToken;
        $tokenModel->expires_at = now()->addHours(2); 
        $tokenModel->save();
    }
}