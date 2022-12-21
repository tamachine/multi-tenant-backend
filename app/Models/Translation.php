<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Spatie\TranslationLoader\LanguageLine;

class Translation extends LanguageLine
{
    use HashidTrait;

    protected $table = 'language_lines';

    protected $appends = ['full_key'];    

    public function getFullKeyAttribute() 
    {
        return $this->group . "." . $this->key;
    }

    /**********************************
    * Scopes
    **********************************/

    /**
     * Scope to search the model
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $search)
    {
        if (!empty($search)) {
            
            $term = '%'.$search.'%';

            $query->where('text', 'like', $term)
                ->orWhere('group', 'like', $term)
                ->orWhere('key', 'like', $term)
                ->orWhereRaw("CONCAT_WS('.', `group`, `key`) like ?", $term);                                               
        }      
        
        return $query;
    }
}