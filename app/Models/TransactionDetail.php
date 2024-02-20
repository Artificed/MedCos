<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function TransactionHeader() {
        return $this->belongsTo(TransactionHeader::class);
    }

    public function Product() {
        return $this->belongsTo(Product::class);
    }
}
