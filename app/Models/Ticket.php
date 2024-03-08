<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = ["reservation_id","plan", "date_res", "date_rec"];

    public function Reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
