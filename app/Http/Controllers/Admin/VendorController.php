<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function index(Request $request): View
    {
        $data = [
            'action' => collect([
                'route' => route('vendor.create'),
                'title' => 'Create Vendor'
            ]),
        ];

        return view('admin.vendor.index')->with($data);
    }

    public function create(Request $request): View
    {
        $data = [
            'action' => collect([
                'route' => route('vendor.index'),
                'title' => 'Vendors'
            ]),
        ];

        return view('admin.vendor.create')->with($data);
    }

    public function edit($hashid, Request $request): View
    {
        $vendor = Vendor::where('hashid', $hashid)->firstOrFail();

        $data = [
            'vendor' => $hashid,
            'action' => collect([
                'route' => route('vendor.index'),
                'title' => 'Vendors'
            ]),
        ];

        return view('admin.vendor.edit')->with($data);
    }
}
