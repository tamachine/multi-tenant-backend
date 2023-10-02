<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;

class ContactUserDetailsType extends Model
{
    use HashidTrait, HasApiResponse;

    protected $fillable = ['type'];   
    
    protected $apiResponse = ['hashid','type'];

    public function contactuserdetail() {
         return $this->hasMany(ContactUserDetail::class, 'contact_user_id','id');
    }
}
