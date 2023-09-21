<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUserMessage extends Model
{
    use HashidTrait, HasApiResponse;

    protected $fillable = ['contact_user_id','subject','type','message'];   
    
    protected $apiResponse = ['contact_user_id','subject','type','message'];

    public function contactuser()
    {
        return $this->belongsTo(ContactUser::class,'contact_user_id','id');
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
        $query = $query->join('contact_users as cu','cu.id','=','contact_user_messages.contact_user_id')
                 ->select('name','email','contact_user_messages.created_at','subject','message','contact_user_messages.hashid');

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
