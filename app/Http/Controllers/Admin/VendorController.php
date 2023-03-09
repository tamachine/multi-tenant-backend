<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.vendor.create'),
                'title' => 'Create Vendor'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.vendor.index')->with($data);
    }

    public function create($caren_vendor = null): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.vendor.index'),
                'title' => 'Vendors'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Vendors' => route('intranet.vendor.index')
            ],
            'caren_vendor' => $caren_vendor,
        ];

        return view('admin.vendor.create')->with($data);
    }

    public function edit($hashid, $tab = null): View
    {
        $this->authorize('admin');

        $vendor = Vendor::where('hashid', $hashid)->firstOrFail();

        $data = [
            'vendor' => $vendor,
            'vendorName' => $vendor->name,
            'action' => collect([
                'route' => route('intranet.vendor.index'),
                'title' => 'Vendors'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Vendors' => route('intranet.vendor.index')
            ],
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.vendor.edit')->with($data);
    }
}
