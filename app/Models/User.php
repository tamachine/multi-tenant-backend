<?php

namespace App\Models;

use App\Traits\HashidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, HashidTrait, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'blogger'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**********************************
     * Methods
     **********************************/

    /**
     * Check if the user has the role 'developer'
     *
     * @return  bool
     */
    public function isDeveloper()
    {
        return $this->role == 'developer';
    }

    /**
     * Check if the user has the role 'superAdmin' or higher
     *
     * @return  bool
     */
    public function superAdminOrHigher()
    {
        return in_array($this->role, ['developer', 'superAdmin']);
    }

    /**
     * Check if the user has the role 'admin' or higher
     *
     * @return  bool
     */
    public function adminOrHigher()
    {
        return in_array($this->role, ['developer', 'superAdmin', 'admin']);
    }

    /**********************************
     * Accessors & Mutators
     **********************************/

     /**
     * After a user logs in, work out the URL for the right redirect
     *
     * @return     string
     */
    public function getAfterLoginRedirectToAttribute()
    {
        switch ($this->role) {
            case 'developer':
            case 'superAdmin':
            case 'admin':
            case 'booking':
            case 'content':
                return route('dashboard');
            default:
                return '/';
        }
    }

    /**********************************
     * Scopes
     **********************************/

    /**
     * Scope to search for developer users
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeDeveloperSearch($query, $search)
    {
        $query->where('role', 'developer')
            ->where('id', '!=', auth()->user()->id);

        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('name', 'like', $term)
                    ->orWhere('email', 'like', $term);
            });
        }

        return $query;
    }

    /**
     * Scope to search for users other than developers
     *
     * @param      object  $query    Illuminate\Database\Query\Builder
     * @param      object  $request  Illuminate\Http\Request
     *
     * @return     object  Illuminate\Database\Query\Builder
     */
    public function scopeSuperAdminSearch($query, $search)
    {
        $query->where('role', '!=', 'developer')
            ->where('id', '!=', auth()->user()->id);

        if (!empty($search)) {
            //break down multiple words into sepearate string queries, using " " to group words
            //into a single query
            collect(str_getcsv($search, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = '%' . $term . '%';
                $query->where('name', 'like', $term)
                    ->orWhere('email', 'like', $term);
            });
        }

        return $query;
    }
}
