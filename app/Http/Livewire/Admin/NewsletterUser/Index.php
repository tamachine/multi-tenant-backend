<?php

namespace App\Http\Livewire\Admin\NewsletterUser;

use App\Models\NewsletterUser;
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
     * @var int
     */
    public $count;

    /**
     * @var array
     */
    public $users = [];

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

    public function render()
    {
        $newsletterUsers = NewsletterUser::livewireSearch($this->search);                               

        $this->users = $newsletterUsers->get()->toArray();

        return view('livewire.admin.newsletter-user.index', ['newsletterUsers' => $newsletterUsers->paginate(perPage())]);
    }

    public function saveNewsletterUser($key) {
        $this->dispatchBrowserEvent('validationError');
       
        NewsletterUser::where('hashid',  $this->users[$key]['hashid'])->update([
            'active' => $this->users[$key]['active']
        ]);

        $this->dispatchBrowserEvent('open-success', ['message' => 'Newsletter user updated' .  $this->users[$key]['email']]);
    }

    public function deleteNewsletterUser($hashid, NewsletterUser $user)
    {
        $user = $user->whereHashid($hashid)->firstOrFail();
        $user->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Newsletter user deleted successfully');

        return redirect()->route('intranet.newsletter-users.index');
    }
}
