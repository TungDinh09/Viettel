<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'PaymentID';
    protected $fillable = [
        'PaymentName',
        'PaymentDescription',
        'DayPayment',
    ];

    public $timestamps = true;
}