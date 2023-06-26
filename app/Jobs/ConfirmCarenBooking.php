<?php

namespace App\Jobs;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use App\Apis\Caren\Api;

/**
 * Queued job to confirm a booking in caren
 */
class ConfirmCarenBooking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var App\Models\Booking
     */
    protected $booking;

    protected $api;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;        

        $this->api = new Api();
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle()
    {
        Log::debug('CreateCarenBooking STARTED for booking ' . $this->booking->hashid);
        
        $carenBooking = $this->api->confirmBooking([
            "RentalId"  => $this->booking->vendor->caren_settings["rental_id"],
            "Guid"      => $this->booking->caren_guid
        ]);

        // When there is an error confirming, "Success" is equal to false
        if (isset($carenBooking["Success"]) && $carenBooking["Success"] == false) {
            Log::error("Error confiming booking in Caren. Booking ID: " . $this->booking->id . ". Error: " . $carenBooking["Message"]);
        }

        // Save a booking log
        if(auth()->check()) {        
            $this->booking->logs()->create([
                'user_id'    => auth()->check() ? auth()->user()->id : null,
                'message'    => 'Booking confirmed in Caren'
            ]);
        }
            
        // Reload the booking information from Caren
        $bookingInfo = $this->api->bookingInfo([
            "RentalId"  => $this->booking->vendor->caren_settings["rental_id"],
            "Guid"      => $this->booking->caren_guid,
        ]);

        // When "Success" is set, there has been an error (irony)
        if (isset($bookingInfo["Success"])) {
            Log::error("Error reloading Caren booking. Booking ID: " . $this->booking->id . ". Error: " . $bookingInfo["Message"]);           
            return;
        }

        $this->booking->update([
            'caren_info' => $bookingInfo
        ]);

        Log::debug('CreateCarenBooking FINISHED for booking ' . $this->booking->hashid);          
    }
}
