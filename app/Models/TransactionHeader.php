<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    use HasFactory;
    use HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }
}
