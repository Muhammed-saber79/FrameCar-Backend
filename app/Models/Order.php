<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneNumber',
        'carType',
        'glassType',
        'glassPosition',
        'brokenGlassImage',
        'status',
        'user_id',
        'longitude',
        'latitude',
        'locationLink'
    ];

    public function setLocationLinkAttribute()
    {
        $this->attributes['locationLink'] = 'https://maps.google.com/?q=' . $this->latitude . ',' . $this->longitude;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
