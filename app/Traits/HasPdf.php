<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use App\Traits\HasFiles;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Notifications\Notifiable;

/**
 * This trait manages a unique pdf for an instance
 */
trait HasPdf
{           
    protected $pdf_disk = 'pdfs';    

    use HasFiles, Notifiable;

    /**
     * Delete any old versions of the PDF
     *
     * @return void
     */
    public function deleteOldPdf()
    {
        if ($this->has_pdf) {
            Storage::disk($this->pdf_disk)->delete($this->pdf_path);
        }
    }   

    /**
     * Get the PDF path
     *
     * @return string
    */
    public function getPdfPathAttribute() : string
    {
        return $this->getModelFolder() . '/' . $this->getInstanceFolder() . '/' . $this->getPdfFileName();
    }

    /**
     * Get the full PDF path
     * @return string
     */
    public function getFullPdfPathAttribute() : string 
    {
        return Storage::disk($this->pdf_disk)->path($this->pdf_path);
    }

     /**
     * Get the url for the pdf
     *
     * @return string
    */
    public function getPdfUrlAttribute() : string
    {
        return Storage::disk($this->pdf_disk)->url($this->pdf_path);
    }

    /**
     * Uploads a pdf file
     */
    public function uploadPdf() {
        $this->loadPdf()->save($this->pdf_path, $this->pdf_disk);
    }

    /**
     * returns an instance of the pdf
     * 
     * @return Barryvdh\DomPDF\PDF
     */
    public function loadPdf() {
        return Pdf::loadView($this->getPdfView(), $this->getPdfData());
    }

    /**
     * Checks if the instance has a pdf file
     * 
     * @return bool
     */
    public function getHasPdfAttribute() : bool {
        return Storage::disk($this->pdf_disk)->exists($this->pdf_path);
    }   

   /**
     * Get the pdf file name 
     *
     * @return string
    */
    public function getPdfFileName() : string {
        return 'booking-'.$this->order_id.'.pdf';
    }
    
    /**
     * Gets the view to generate the pdf. By default is the bookings one but it can be overrided in the model
     * 
     * @return string
     */
    protected function getPdfView() : string {
        return 'pdfs.booking';
    }

    /**
     * Gets the data for the view to generate the pdf. By default is the bookings one but it can be overrided in the model
     * 
     * @return array
     */
    protected function getPdfData() : array {
        return ['booking' => $this];
    }
}