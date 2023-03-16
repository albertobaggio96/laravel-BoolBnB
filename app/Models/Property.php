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

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }


}
