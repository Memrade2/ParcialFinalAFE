<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function rental_details(){
        return $this->hasMany(Rental_detail::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function rental_users(){
        return $this->hasMany(Rental_user::class);
    }


}
