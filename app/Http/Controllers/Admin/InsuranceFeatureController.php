<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InsuranceFeature;
use Illuminate\View\View;

class InsuranceFeatureController extends Controller
{
    public function index(): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.insurance-feature.create'),
                'title' => 'Create Insurances feature'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings')
            ]
        ];

        return view('admin.insurance-feature.index')->with($data);
    }

    public function create($caren_extra = null): View
    {
        $this->authorize('admin');

        $data = [
            'action' => collect([
                'route' => route('intranet.insurance-feature.index'),
                'title' => 'Insurances features'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'Insurances features' => route('intranet.insurance-feature.index')
            ],
            'caren_extra' => $caren_extra,
        ];

        return view('admin.insurance-feature.create')->with($data);
    }

    public function edit(InsuranceFeature $insuranceFeature): View
    {        
        $this->authorize('admin');

        $data = [
            'insuranceFeature' => $insuranceFeature,            
            'action' => collect([
                'route' => route('intranet.insurance-feature.index'),
                'title' => 'InsuranceFeatures'
            ]),
            'crumbs' => [
                'Settings' => route('intranet.settings'),
                'InsuranceFeatures' => route('intranet.insurance-feature.index')
            ],            
        ];

        return view('admin.insurance-feature.edit')->with($data);
    }
}
