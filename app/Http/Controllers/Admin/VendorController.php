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
                'route' => route('vendor.create'),
                'title' => 'Create Vendor'
            ]),
        ];

        return view('admin.vendor.index')->with($data);
    }

    public function create($caren_vendor = null): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('vendor.index'),
                'title' => 'Vendors'
            ]),
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
                'route' => route('vendor.index'),
                'title' => 'Vendors'
            ]),
            'tab' => emptyOrNull($tab) ? 'basic' : $tab,
        ];

        return view('admin.vendor.edit')->with($data);
    }
}
