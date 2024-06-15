<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'lastname', 'firstname', 'middlename', 'address', 'city_id', 'state_id', 'country_id', 'zip',
        'birthdate', 'date_hired', 'date_join', 'department_id', 'division_id', 'picture', 'email'
    ];
    
}
