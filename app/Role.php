<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * string name
 * string slug
*/
class Role extends Model
{
     protected $fillable = [
        'name',
        'slug',
    ];

    /**
    * A role can has many users
    */
    public function users() {
        return $this->hasMany('App\User');
    }
}
