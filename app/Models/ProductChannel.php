<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChannel extends Model
{
    use HasFactory;
    protected $table = 'product_channels';
    protected $primaryKey = 'ProductChannelID';
    public $timestamps = true;
}