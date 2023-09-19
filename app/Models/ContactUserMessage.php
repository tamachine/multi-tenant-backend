<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUserMessage extends Model
{
    use HasApiResponse;

    protected $fillable = ['contact_user_id','subject','type','message'];   
    
    protected $apiResponse = ['contact_user_id','subject','type','message'];

}
