<?php

namespace App\Services;

use App\Console\Commands\OpenExchangeRatesSync;
use Spatie\SlackAlerts\Facades\SlackAlert;
use Illuminate\Support\Facades\Log;

/**
 * 
 * This class manage the slack alert when open exchange api fails to send only one message until the api works again
 */
class OpenExchangeSlackAlertsWhenApiFails
{        
    protected $sessionName = 'openExchangeSlack';    

    public function worked() {
        if($this->messageAlreadySent()) {
            SlackAlert::to('nave-intergalactica')->message("Open exchange rates api is working again.");

            Log::error('Open exchange rates working');
        }

        $this->destroySession();
    }

    public function failed() {
        if(!$this->messageAlreadySent()) {
            //if (config('settings.slack.enabled')) {
                SlackAlert::to('nave-intergalactica')->message("Open exchange rates api failed. Rates in database are being used. They are updated daily at 8am but it is recommended to check values in intranet");

                Log::error('Open exchange rates api failed');

                $this->messageSent();                
            //}
        }
        
    }

    protected function destroySession() {
        session()->forget($this->sessionName);
    }

    protected function messageAlreadySent() {        
        OpenExchangeRatesSync::orderBy('created_at')->first();                    
    }

    protected function messageSent()
    {
        OpenExchangeRatesSync::create(['failed' => true]);
    }
}

?>