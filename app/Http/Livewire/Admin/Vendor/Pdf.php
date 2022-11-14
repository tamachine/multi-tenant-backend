<?php

namespace App\Http\Livewire\Admin\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pdf extends Component
{
    use WithFileUploads;

    /*
    ***************************************************************
    ** PROPERTIES
    ***************************************************************
    */

    /**
     * @var App\Models\Vendor
     */
    public $vendor;

    /**
     * @var string
     */
    public $path;

    /**
     * @var object
     */
    public $pdf;

    /*
    ***************************************************************
    ** METHODS
    ***************************************************************
    */
    public function mount($vendor, Vendor $vendorModel)
    {
        $this->vendor = $vendorModel->where('hashid', $vendor)->firstOrFail();

        $this->path = $this->vendor->pdf_path;
    }

    public function uploadPdf()
    {
        $this->validate([
            'pdf'      => ['required', 'mimes:pdf'],
        ]);

        // Delete previous pdf (if there is one)
        if ($this->path != '') {
            Storage::disk('public')->delete("vendors/pdf/" . $this->vendor->hashid . "pdf");
        }

        $filename = $this->vendor->hashid . ".pdf";
        $this->pdf->storeAs("public/vendors/pdf/" , $filename);

        session()->flash('status', 'success');
        session()->flash('message', 'Pdf uploaded successfully');

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "pdf"]);
    }

    public function deletePdf()
    {
        Storage::disk('public')->delete("vendors/pdf/" . $this->vendor->hashid . ".pdf");
        $this->path = '';

        session()->flash('status', 'success');
        session()->flash('message', __('The PDF has been deleted successfully'));

        return redirect()->route('vendor.edit', ["vendor" => $this->vendor->hashid, "tab" => "pdf"]);
    }

    public function render()
    {
        return view('livewire.admin.vendor.pdf');
    }
}
