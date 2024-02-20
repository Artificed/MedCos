<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function Product() {
        return $this->belongsTo(Product::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
