<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable= [
        'user_id',
        'title',
        'slug',
        'slug',
        'description',
        'night_price',
        'n_beds',
        'n_rooms',
        'n_toilettes',
        'cover_img',
        'mq',
        'visible',
        'address',
        'latitude',
        'longitude',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class)->withPivot('start_date','end_date');
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function views(){
        return $this->hasMany(View::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
}

