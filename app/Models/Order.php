<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'receiver_address',
        'phone',
        'status',
        'user_id',
        'product_id'
    ];

    // Relation with users table
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // Relation with products table
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
