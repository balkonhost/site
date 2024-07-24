<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class DomainController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $domains = $user->domains()
            ->paginate(25); // ->paginate(2, ['*'], 'page')

        return view('home.domain', compact('domains'));
    }
}
