<?php

namespace App\Http\Controllers;

class BalanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $transactions = $user->transactions()
            ->orderByDesc('created_at')
            ->paginate(25);

        return view('home.balance', compact('user', 'transactions'));
    }
}
