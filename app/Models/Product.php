<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'price',
        'description',
        'stock',
        'created_at',
        'updated_at'
    ];

    public function Category() {
        return $this->belongsTo(Category::class);
    }

    public function ProductImage() {
        return $this->hasMany(ProductImage::class);
    }

    public function Cart() {
        return $this->hasMany(Cart::class);
    }

    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }
}
