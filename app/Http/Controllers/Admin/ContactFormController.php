<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUser;
use App\Models\ContactUserMessage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ContactFormController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');        

        $data = [            
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.contact-user.index')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $this->authorize('admin');

        $contactUser = ContactUserMessage::where('contact_user_messages.hashid', $hashid)
                    ->join('contact_users as cu','cu.id','=','contact_user_messages.contact_user_id')->firstOrFail();
        
        $isAdmin = Gate::allows('admin');

        $data = [
            'contactUser' => $contactUser,
            'contactUserName' => $contactUser->name ,
            'action' => collect([
                'route' => route('intranet.contact-users.index'),
                'title' => 'Contact Users'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
            ],
            'tab' => request()->query('tab') ?? $isAdmin ? 'basic' : 'seo-configuration' ,
            'isAdmin' => $isAdmin
        ];
        
        return view('admin.contact-user.edit')->with($data);
    }

}
