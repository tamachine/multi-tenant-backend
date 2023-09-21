<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Model;

class ContactUser extends Model
{
    use HashidTrait, HasApiResponse;

    protected $fillable = ['email','name'];   
    
    protected $apiResponse = ['email','name'];

    public function contactmessages() {
         return $this->hasMany(ContactUserMessage::class, 'contact_user_id','id');
    }

}
