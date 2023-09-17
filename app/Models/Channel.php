<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
    protected $table = 'channels';
    protected $primaryKey = 'ChannelID';
    protected $fillable = [
        'ChannelName',
        'Price',
    ];

    public $timestamps = true;

    public function setPriceAttribute($value)
    {
        $this->attributes['Price'] = number_format($value, 2);
    }
    
}