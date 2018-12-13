<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','street_address', 'city', 'state', 'zip', 'phone_number'];

    public function employees()
    {
        return $this->belongsToMany('App\Employee','location_id');
    }

}
