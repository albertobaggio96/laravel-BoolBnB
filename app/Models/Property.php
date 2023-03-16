<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'title',
        'description',
        'night_price',
        'n_beds',
        'n_rooms',
        'cover_img',
        'mq',
        'visible',
        'address',
        'latitude',
        'longitude'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
