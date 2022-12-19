<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $username_email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'username_email' => ['required'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate(
            $this->rules,
            [
                'username_email' => 'Username/Email is required',
            ]
        );

        if(filter_var($this->username_email, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }

        if (!Auth::attempt([$field => $this->username_email, 'password' => $this->password], $this->remember)) {
            $this->addError('username_email', trans('auth.failed'));

            return;
        }

        \Log::info(auth()->user()->afterLoginRedirectTo);

        return redirect()->intended(auth()->user()->afterLoginRedirectTo);
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.auth');
    }
}
