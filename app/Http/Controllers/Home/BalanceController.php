<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $transactions = $user->transactions()->orderByDesc('created_at')->paginate(25);

        return view('home.balance.index', compact('user', 'transactions'));
    }

    public function refill(Request $request)
    {
        $user = auth()->user();
        if ($transaction = $user->transactions()->where(['confirmed' => false, 'type' => 'deposit'])->first()) {
            return redirect(route('home.balance.transaction', $transaction));
        } elseif ('POST' == $request->getMethod()) {
            $request->validate([
                'amount' => ['required', 'numeric', 'min:10', 'max:5000'],
                [
                    'amount.min' => 'Минимум можно 10 деревянных.',
                    'amount.max' => 'максимум можно 5к деревянных.',
                ]
            ]);

            $amount = $request->get('amount');

            $data = [
                'type' => 'refill',
                'method' => 'card',
                'number' => '7891',
                'code' => random_int(1000, 9999),
                'description' => "Пополнение баланса на сумму {$amount} ". trans_choice('рубль|рубля|рублей', $amount) .".",
                'comment' => 'Оплата на карту',
            ];

            $user->deposit($amount, $data, false);
        }

        return view('home.balance.refill', compact('transaction'));
    }

    public function transaction($id)
    {
        $user = auth()->user();
        $transaction = $user->transactions()->find($id);
        dd($transaction);
    }
}
