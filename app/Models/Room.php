<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['number', 'type', 'price', 'is_available', 'image',];

    public static function getRoomTypes()
    {
        return [
            'Standard Room' => 'Standard Room',
            'Superior Room' => 'Superior Room',
            'Deluxe Room' => 'Deluxe Room',
            'Suite Room' => 'Suite Room',
            'Presidential Room' => 'Presidential Room',
        ];
    }

    public function book()
    {
        $this->is_available = false;
        $this->save();
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
