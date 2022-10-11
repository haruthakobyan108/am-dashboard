<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class UserOrganizationsMap extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    protected $connection= 'friendship';
    protected $table = 'user_organizations_map';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
     protected $fillable = [
         'organization_id',
         'user_id',
         'role_id',
         'active'
     ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function organizations()
    {
        return $this->belongsTo('App\Models\Organizations','organization_id','id');
    }

    public function userFriendship()
    {
        return $this->belongsTo('App\Models\UserFriendship','user_id','id');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\FsRoles','role_id','id');
    }

//    public function user()
//    {
//        return $this->hasOne('App\Models\UserFriendship','id','user_id');
//    }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
