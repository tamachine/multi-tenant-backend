<?php

namespace App\Exports;

use App\Models\NewsletterUser;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NewsletterExport implements FromView
{
    /**
     * @var object
     */
    protected $users;

    public function __construct()
    {
        $this->users = NewsletterUser::subscribers()->get();
    }

    public function view(): View
    {
        return view('exports.newsletter', ['users' => $this->users]);
    }
}
