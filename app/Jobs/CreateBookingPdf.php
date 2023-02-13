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
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;

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

        // Create and save PDF
        //$pdf = Pdf::loadView('pdf.booking', ['booking' => $this->booking]);
        //Storage::disk('public')->put('bookings/pdf/' . $this->booking->hashid . '.pdf', $pdf->output());

        $url = route('booking.pdf', $this->booking->hashid);

        Browsershot::url($url)
            ->authenticate(config('browshershot.username'), config('browshershot.password'))
            ->ignoreHttpsErrors()
            ->format('A4')
            ->setIncludePath(config('browshershot.include_path'))
            ->noSandbox()
            ->margins(0, 0, 0, 0)
            ->timeout(120)
            ->waitUntilNetworkIdle()
            ->savePdf(storage_path() . '/app/public/bookings/pdf/' . $this->booking->hashid . '.pdf');

        Log::debug('CreateBookingPdf FINISHED for booking ' . $this->booking->hashid);

        if ($this->send) {
            $this->booking->notify(new SendBookingPdfMail);
        }
    }
}
