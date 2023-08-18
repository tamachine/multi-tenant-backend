<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\HashidTrait;
use App\Models\SeoConfiguration;
use App\Traits\HasApiResponse;

class SeoSchema extends Model
{  
    use HasTranslations, HashidTrait, HasApiResponse;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = ['schema'];

    protected $fillable  = ['schema', 'type', 'seo_configuration_id'];

    protected $apiResponse = ['schema', 'type'];

    public function seoConfiguration() {
        return $this->belongsTo(SeoConfiguration::class);
    }
}