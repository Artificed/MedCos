<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TransactionHeaderController extends Controller
{
    public function createTransactionHeader() {

        $trHeader = TransactionHeader::create([
            'id' => Str::uuid()->toString(),
            'user_id' => Auth::user()->id,
            'status' => 'Unpaid'
        ]);

        return $trHeader;
    }
}
