<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = 'orders';
    protected $primaryKey = 'OrderID';
    protected $fillable = [
        'ProductPrice',
        'Accept',
        'name',
        'Phone',
        'email',
        'CityID',
        'DistrictID',
        'Address',
        'DateStart',
        'ServicePrice',
        'UserID',
        'PaymentID',
        'ProductID',
        'ServiceID',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'CityID', 'CityID');
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'DistrictID', 'DistrictID');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'PaymentID', 'PaymentID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceID', 'ServiceID');
    }
}