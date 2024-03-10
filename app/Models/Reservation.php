<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ["user_id","plan", "event_id", "status", "date_res" , "date_rec"];


    public function Event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Ticket()
    {
        return $this->hasOne(Ticket::class, 'reservation_id');
    }
}
