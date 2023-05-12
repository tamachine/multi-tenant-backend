<?php

namespace App\Services;

use App\Models\OpenExchangeSlackAlerts;
use Spatie\SlackAlerts\Facades\SlackAlert;
use Illuminate\Support\Facades\Log;

/**
 * 
 * This class manages the slack alert when open exchange api fails to send only one message until the api works again
 */
class OpenExchangeSlackAlertsWhenApiFails
{        
    protected $sessionName = 'openExchangeSlack';    

    /**
     * Method called when api is working. It sends a slack message if the api has failed before
     */
    public function working() {
        if($this->messageAlreadySent()) {
            if (config('settings.slack.enabled')) {
                SlackAlert::to('nave-intergalactica')->message("Open exchange rates api is working again.");
            }

            Log::error('Open exchange rates working');

            $this->workingAgain();
        }

        
    }

    /**
     * Method called when api is failing. It sends a slack message only first time it fails
     */
    public function failed() {
        if(!$this->messageAlreadySent()) {
            if (config('settings.slack.enabled')) {
                SlackAlert::to('nave-intergalactica')->message("Open exchange rates api failed. Rates in database are being used. They are updated daily at 8am but it is recommended to check values in intranet: " . route('intranet.rate.index'));
            }
            
            Log::error('Open exchange rates api failed');

            $this->messageSent();                
            
        }        
    }

    /**
     * Checks if a message was already sent
     * @return bool
     */
    protected function messageAlreadySent(): bool {        
        return OpenExchangeSlackAlerts::latest()->first()?->failed ?? false;                    
    }

    /**
     * Creates a row in open_exchange_slack_alerts with failed to false
     */
    protected function workingAgain() {
        OpenExchangeSlackAlerts::create(['failed' => false]);
    }

    /**
     * Creates a row in open_exchange_slack_alerts with failed to true
     */
    protected function messageSent()
    {
        OpenExchangeSlackAlerts::create(['failed' => true]);
    }
}

?>