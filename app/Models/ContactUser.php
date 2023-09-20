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

    // /**********************************
    //  * Scopes
    //  **********************************/

    // /**
    //  * Scope to type the model
    //  *
    //  * @param      object  $query    Illuminate\Database\Query\Builder
    //  * @param      object  $request  Illuminate\Http\Request
    //  *
    //  * @return     object  Illuminate\Database\Query\Builder
    //  */
    public function scopeLivewireSearch($query, $type, $search)
    {
        if (!empty($type)) {
            $query->where('type', $type);
        }
        
        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('email', 'like', $term)
                    ->orWhere('subject', 'like', $term);
            });
        }
        return $query;
    }

}
