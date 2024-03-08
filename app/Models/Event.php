<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","title","category","autoTicket", "image", "description", "place", "quantity", "date", "date_res" , "date_rec"];
    

    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Reservation()
    {
        return $this->hasMany(Reservation::class, 'event_id', 'id');
    }


    
}
