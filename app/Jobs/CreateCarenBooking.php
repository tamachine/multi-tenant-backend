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
 * Queued job to create a booking in caren and update the booking
 */
class CreateCarenBooking implements ShouldQueue
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

        $carenBooking = $this->api->createBooking($this->booking->carenParameters);

        // When "Success" is set, there has been an error (irony)
        if (isset($carenBooking["Success"])) {
            Log::error("Error creating booking in Caren. Booking ID: " . $this->booking->id . ". Error: " . $carenBooking["Message"]);            
            return;
        }

        // Booking created successfully. We get the "Guid" in the response
        $this->booking->update([
            'caren_guid' => $carenBooking["Guid"]
        ]);

        // Save a booking log
        if(auth()->check()) {        
            $this->booking->logs()->create([
                'user_id'    => auth()->check() ? auth()->user()->id : null,
                'message'    => 'Booking created in Caren'
            ]);
        }

        // Save the booking info from Caren
        $bookingInfo = $this->api->bookingInfo([
            "RentalId" => $this->booking->vendor->caren_settings["rental_id"],
            "Guid" => $carenBooking["Guid"],
        ]);

        if (!isset($bookingInfo["Success"])) {
            $this->booking->update([
                'caren_id'      => $bookingInfo["Id"],
                'caren_info'    => $bookingInfo
            ]);
        }

        Log::debug('CreateCarenBooking FINISHED for booking ' . $this->booking->hashid);          
    }
}
