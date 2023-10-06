<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactUserDetailsType extends Model
{
    use HashidTrait, HasApiResponse, HasTranslations;

    protected $fillable = ['hashid','name'];   
    
    protected $apiResponse = ['hashid','name'];

    public $translatable = ['name'];

    public function contactuserdetail() {
         return $this->hasMany(ContactUserDetail::class, 'contact_user_id','id');
    }
}
