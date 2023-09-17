<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductChannel extends Model
{
    use HasFactory;
    protected $table = 'product_channels';
    protected $primaryKey = 'product_channelID';
    protected $fillable = [
        'ChannelID',
        'ProductID',
    ];

    public $timestamps = true;

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'ChannelID', 'ChannelID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductID', 'ProductID');
    }
}