<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
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
     * @var string
     */
    public $role;

    /**
     * @var bool
     */
    public $blogger = false;

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
            'role'  => ['required', 'in:' . collectConfig('roles.intranet_roles')->keys()->implode(',')],
        ]);

        $user = $user->create([
            'name'      => $this->name,
            'email'     => $this->email,
            'role'      => $this->role,
            'blogger'   => $this->blogger,
            'password'  => bcrypt(now())
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'User "' . $this->name . '" created');

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
