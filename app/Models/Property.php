<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
class Property extends Model
{
    use HasFactory;

    protected $fillable= [
        'user_id',
        'title',
        'slug',
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

<<<<<<< HEAD
    public function messages() {
        return $this->hasMany(Message::class);
    }
=======
    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function views(){
        return $this->hasMany(View::class);
    }


>>>>>>> 58dac057cc2b779c861710988e7b868552ae2c12
}
