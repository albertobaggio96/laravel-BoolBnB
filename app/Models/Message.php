<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['property_id', 'mail_from', 'name', 'subject', 'message'];

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
