<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function index()
    {}

    public function list()
    {
        $user = auth()->user();
        $services = $user->hostings()->paginate(25);

        return view('home.hosting', compact('services'));
    }
}
