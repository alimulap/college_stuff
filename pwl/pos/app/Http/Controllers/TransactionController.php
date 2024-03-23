<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function transactions()
    {
        $transactions = [
            ['id' => 1, 'name' => 'Budi', 'product' => 'Indomie', 'qty' => 10],
            ['id' => 2, 'name' => 'Andi', 'product' => 'Mie Sedap', 'qty' => 20],
            ['id' => 3, 'name' => 'Joko', 'product' => 'Supermie', 'qty' => 30],
        ];
        return view('transaction', ['transactions' => $transactions]);
    }
}
