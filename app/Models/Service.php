<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $primaryKey = 'ServiceID';
    protected $fillable = [
        'ServiceName',
        'Price',
    ];

    public $timestamps = true;

    public function setPriceAttribute($value)
    {
        $this->attributes['Price'] = number_format($value, 2);
    }
}