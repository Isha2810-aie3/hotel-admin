<?php

// app/Models/Booking.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone', 'email',
        'arrival', 'departure', 'adults', 'kids', 'payment', 'total_amount', 'requests'
    ];
}
