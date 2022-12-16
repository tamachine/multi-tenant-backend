<?php

namespace App\Http\Livewire\Developer\User;

use App\Models\User;
use App\Notifications\SendWelcomeMail;
use Livewire\Component;

class Create extends Component
{
    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

     /**
     * @var bool
     */
    public $welcome = false;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        //
    }

    public function saveUser(User $user)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'name'  => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        $user = $user->create([
            'name'      => $this->name,
            'username'  => $this->email,
            'email'     => $this->email,
            'role'      => 'developer',
            'blogger'   => true,
            'password'  => bcrypt(now())
        ]);

        // Dispatch welcome email
        if ($this->welcome) {
            $user->notify(new SendWelcomeMail);
        }

        session()->flash('status', 'success');
        session()->flash('message', 'User "' . $this->name . '" created');

        return redirect()->route('developer.user.index');
    }

    public function render()
    {
        return view('livewire.developer.user.create');
    }
}
