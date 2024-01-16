<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'car_front_image',
        'car_back_image',
        'camera_image',
        'status',
        'user_id',
        'longitude',
        'latitude',
        'locationLink',
        'servicePlace',
        'date',
        'time',
        'paymentMethod'
    ];


    public function setLocationLinkAttribute()

    {
        $this->attributes['locationLink'] = 'https://maps.google.com/?q=' . $this->latitude . ',' . $this->longitude;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function getServiceTypeAttribute($value)
    // {
    //     if($value == 'process'){
    //         return 'معالجة زجاج' ;
    //     }elseif($value == 'change'){
    //         return 'تغيير زجاج';
    //     }elseif($value == 'upRepair'){
    //         return 'اصلاح فتحة السقف';

    //     }elseif($value == 'machine'){
    //         return 'اصلاح ماكينة زجاج';

    //     }
    // }

    // protected function locationLink(): Attribute
    //     {

    //         return new Attribute(
    //              get: fn ($value) =>  $value,
    //             set: fn ($value) => 'https://maps.google.com/?q=' . $this->latitude . ',' . $this->longitude
    //         );
    //     }
}
