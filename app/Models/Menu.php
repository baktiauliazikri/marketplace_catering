<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'merchant_id', 'name', 'description', 'price', 'image'
    ];
    

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_menu')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
