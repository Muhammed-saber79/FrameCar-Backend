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
        'carModel',
        'carMadeYear',
        'glassType',
        'glassPosition',
        'serviceType',
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

    public function getServiceTypeAttribute($value)
    {
        if($value == 'process'){
            return 'معالجة زجاج' ;
        }elseif($value == 'change'){
            return 'تغيير زجاج';
        }elseif($value == 'upRepair'){
            return 'اصلاح فتحة السقف';

        }elseif($value == 'machine'){
            return 'اصلاح ماكينة زجاج';

        }
    }
}
