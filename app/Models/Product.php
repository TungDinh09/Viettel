<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'ProductID';
    protected $fillable = [
        'ProductName',
        'Speed',
        'Bandwidth',
        'Price',
        'Gift',
        'Description',
        'IPstatic',
        'UseDay',
        'CategoryID',
        'ServiceID',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'CategoryID');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'ServiceID', 'ServiceID');
    }
}