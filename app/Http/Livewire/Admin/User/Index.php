<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var string
     */
    public $search;

    /**
     * @var array
     */
    public $users = [];

    /**
     * @var bool
     */
    public $test = false;

    /**
     * @var array
     */
    protected $updatesQueryString = [
        'search',
        'page' => ['except' => 1],
    ];

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */

    public function mount()
    {
        $this->fill(request()->only('search', 'page'));
    }

    public function saveUser($key)
    {
        $this->dispatchBrowserEvent('validationError');

        $this->validate([
            'users.*.name'  => ['required'],
            'users.*.role'  => ['required', 'in:' . collectConfig('roles.intranet_roles')->keys()->implode(',')],
        ], [
            'users.*.name.required' => 'I want a name!',
            'users.*.role.in' => 'Very funny"'
        ]);

        $user = $this->users[$key];

        User::where('hashid', $user['hashid'])->update([
            'name'      => $user["name"],
            'role'      => $user["role"],
            'blogger'   => $user["blogger"],
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'Edited user ' . $user["name"]]);
    }

    public function deleteUser($hashid, User $user)
    {
        $user = $user->whereHashid($hashid)->firstOrFail();
        $user->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'User deleted successfully');

        return redirect()->route('intranet.user.index');
    }

    public function render()
    {
        // Little trick for testing purposes
        if (count($this->users) == 1 && isset($this->users[0]["test"])) {
            $this->test = true;
        }

        if (!$this->test) {
            $this->users = User::superAdminSearch($this->search)
                ->orderBy('name', 'asc')
                ->get()
                ->toArray();
        }

        return view('livewire.admin.user.index');
    }
}
