<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // In App\Models\Booking.php
    protected $fillable = ['fname', 'lname', 'email', 'phone', 'property', 'inquiring', 'communication', 'notes'];

}
