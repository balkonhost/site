<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tld;
use Cart;

class CartController extends Controller
{
    public function list()
    {
        $items = Cart::getContent();
        $total = Cart::getTotal();

        return view('cart', compact('items', 'total'));
    }

    public function add(Request $request)
    {
        if ($domain = $request->get('domain')) {
            $this->addDomain($domain);
        }

        return redirect()->back();

        /*Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);*/
    }

    public function update(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Позиция обновлена!');
        return redirect()->route('cart');
    }

    public function remove(Request $request)
    {
        Cart::remove($request->id);

        session()->flash('success', 'Позиция удалена!');
        return redirect()->route('cart');
    }

    public function clear()
    {
        Cart::clear();

        session()->flash('success', 'Корзина очищена!');
        return redirect()->route('cart');
    }

    protected function addDomain($domain)
    {
        // TODO Добавить проверку имени регистрируемого домена и доступность регистрации
        // ...

        $parts = explode('.', $domain, 2);

        if ($tld = (new Tld())->active()->where('tld', end($parts))->first()) {
            Cart::add([
                'id' => $this->defineId(),
                'name' => "Регистрация домена",
                'price' => $tld->reg_price,
                'quantity' => 1,
                'attributes' => array(
                    'domain' => $domain,
                )
            ]);

            session()->flash('success', "Домен {$domain} добавлен в корзину!");
        }
    }

    protected function defineId($id = 0)
    {
        $items = Cart::getContent();

        foreach ($items as $item) {
            if ($item->id > $id) {
                $id = $item->id;
            }
        }

        return ++$id;
    }
}
