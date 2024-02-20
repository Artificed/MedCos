<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function createTransactionDetail($tr_id, $product_id, $quantity) {
        $trDetail = TransactionDetail::create([
            'transaction_id' => $tr_id,
            'product_id' => $product_id,
            'quantity' => $quantity
        ]);
        return $trDetail;
    }
}
