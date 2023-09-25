<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;

class ContactUser extends Model
{
    use HashidTrait, HasApiResponse;

    protected $fillable = ['email'];   
    
    protected $apiResponse = ['email'];

    public function contactuserdetails() {
         return $this->hasMany(ContactUserDetail::class, 'contact_user_id','id');
    }

}
