<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProduct extends Model
{
    use HasFactory;
    protected $table = 'payment_products';
    protected $primaryKey = 'PaymentProductID';
    public $timestamps = true;
}