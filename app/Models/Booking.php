<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'concert_id',
        'confirmation',
        'reservation_code',
        'favorite'
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    public function concert()
    {
        return $this->belongsTo(Concert::class, 'concert_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
