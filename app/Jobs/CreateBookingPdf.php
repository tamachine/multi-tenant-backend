<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Notifications\SendBookingPdfMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;


/**
 * Queued job to generate a PDF for a booking
 */
class CreateBookingPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var App\Models\Booking
     */
    protected $booking;

    /**
     * @var bool
     */
    protected $send;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Booking $booking, $send = false)
    {
        $this->booking = $booking;
        $this->send = $send;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Don't generate PDF in testing as it slows things down too much
        if (app()->environment() == 'testing') {
            return;
        }

        Log::debug('CreateBookingPdf STARTED for booking ' . $this->booking->hashid);

        // In case there was one generated before, delete it.
        $this->booking->deleteOldPdf();

        Log::debug('CreateBookingPdf FINISHED for booking ' . $this->booking->hashid);

        $this->booking->uploadPdf();

        if ($this->send) {
            $this->booking->notify(new SendBookingPdfMail($this->booking));
        }
    }
}
