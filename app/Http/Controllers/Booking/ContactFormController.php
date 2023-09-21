<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\ContactUserMessage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class ContactFormController extends Controller
{
    public function index(): View
    {
        $this->authorize('booking');        

        $data = [            
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('booking.contact-user.index')->with($data);
    }

    public function edit(ContactUserMessage $contactUser, $tab = null): View
    {
        $this->authorize('booking');

        $data = [
            'contactUser' => $contactUser,
            'contactUserName' => $contactUser->contactuser()->first()->name ,
            'action' => collect([
                'route' => route('intranet.booking.contact-users.index'),
                'title' => 'Contact Users'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
            ],
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
            
        ];
        
        return view('booking.contact-user.edit')->with($data);
    }
}
