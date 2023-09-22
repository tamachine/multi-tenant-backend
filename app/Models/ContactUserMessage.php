<?php

namespace App\Models;

use App\Traits\HasApiResponse;
use App\Traits\HashidTrait;
use Carbon\Carbon;
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
    
     /**********************************
     * Scopes
     **********************************/
    /**
     * Scope to search the model for the contact search
     *
     * @param      object  $query Illuminate\Database\Query\Builder
     * @param      string  $type  string
     * @param      string  $contact_start_date  string
     * @param      string  $contact_end_date  string
     * @param      string  $search  string
     * 
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeLivewireSearch($query, $type, $contact_start_date, $contact_end_date, $search)
    {
        $query = $query->join('contact_users as cu','cu.id','=','contact_user_messages.contact_user_id')
                 ->select('name','email','contact_user_messages.created_at','subject','message','type','contact_user_messages.hashid');

        if (!empty($type)) {
            $query->where('type', $type);
        }

        if (!empty($contact_start_date)) {
            $query->whereDate('contact_user_messages.created_at', '>=', Carbon::createFromFormat("d-m-Y", $contact_start_date));
        }

        if (!empty($contact_end_date)) {
            $query->whereDate('contact_user_messages.created_at', '<=', Carbon::createFromFormat("d-m-Y", $contact_end_date));
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
