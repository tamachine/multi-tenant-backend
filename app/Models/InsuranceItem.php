<?php

namespace App\Models;

use App\Helpers\Language;

class InsuranceItem
{
    public $id;    
    public $text = [];

    public static function all() {
        $items = [];

        $items[] = self::getItem(1, 'Third party libelity insurance');
        $items[] = self::getItem(2, 'Super collision damage waiver');
        $items[] = self::getItem(3, 'Third party libelity insurance');
        $items[] = self::getItem(4, 'Super collision damage waiver');
        $items[] = self::getItem(5, 'Third party libelity insurance');
        $items[] = self::getItem(6, 'Super collision damage waiver');
        $items[] = self::getItem(7, 'Third party libelity insurance');

        return $items;
    }

    protected static function getItem($id, $text) {
        $item = new InsuranceItem();

        $item->id = $id;

        $texts = [];
        foreach(Language::availableCodes() as $code)
        {
            $texts[$code] = $text;
        }
        $item->text = $texts;

        return $item;
    }
    
}
