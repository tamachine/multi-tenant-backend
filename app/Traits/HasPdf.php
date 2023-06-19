<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasFiles;
use Barryvdh\DomPDF\Facade\Pdf;

trait HasPdf
{           
    protected $pdf_disk = 'pdfs';    

    use HasFiles;

    /**
     * Delete any old versions of the PDF
     *
     * @return     void
     */
    public function deleteOldPdf()
    {
        if ($this->has_pdf) {
            Storage::disk($this->pdf_disk)->delete($this->pdf_path);
        }
    }   

    /**
     * Get the booking's PDF path
     *
     * @return     string
    */
    public function getPdfPathAttribute()
    {
        return $this->getModelFolder() . '/' . $this->getInstanceFolder() . '/' . $this->getPdfFileName();
    }

     /**
     * Get the booking's PDF path
     *
     * @return     string
    */
    public function getPdfUrlAttribute()
    {
        return Storage::disk($this->pdf_disk)->url($this->pdf_path);
    }

    public function uploadPdf() {
        $this->loadPdf()->save($this->pdf_path, $this->pdf_disk);
    }

    public function loadPdf() {
        return Pdf::loadView($this->getPdfView(), $this->getPdfData());
    }

    public function getHasPdfAttribute() {
        return Storage::disk($this->pdf_disk)->exists($this->pdf_path);
    }

    public function sendPdf($notificationClass) {

    }

   /**
     * Get the pdf file name 
     *
     * @return string
    */
    public function getPdfFileName() {
        return 'booking-'.$this->order_number.'.pdf';
    }

    

    protected function getPdfView() {
        return 'pdfs.booking';
    }

    protected function getPdfData() {
        return ['booking' => $this];
    }
}