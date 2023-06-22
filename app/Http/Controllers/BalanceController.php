<?php

namespace App\Http\Controllers;

class BalanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*$user->deposit(2000, [
            'description' => 'Пополнение баланса.',
            'comment' => 'Безналичный перевод от юридического лица.'
        ]);*/

        $transactions = $user->transactions()
            ->orderByDesc('created_at')
            ->paginate(25);

        return view('home.balance', compact('user', 'transactions'));
    }
}
