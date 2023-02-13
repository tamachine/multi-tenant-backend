<?php

namespace App\Models;

use App\Helpers\Currency as CurrencyHelper;
use App\Traits\HasApiResponse;

class Currency {

    public $id;
    public $text;
    public $symbol;

    use HasApiResponse;

    protected $apiResponse = ['id', 'text', 'symbol'];

    public static function all() {
        $currencies = ['usd','eur','gbp','isk'];
        $symbols    = ['$',  '€',  '£',  'kr'];

        foreach($currencies as $index => $item) {
            $currency = new Currency();
            $currency->id = $item;

            foreach(CurrencyHelper::availableCodes() as $code) {
                $text[$code] = $item;
            }

            $currency->text = $text;
            $currency->symbol = $symbols[$index];

            $all[] = $currency;
        }

        return collect($all);
    }

    public function getTextTranslated() {
        return $this->text[App::getLocale()];
    }
}
