<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iodev\Whois\Factory;
use App\Models\Tld;

class DomainController extends Controller
{
    public function index(Tld $tld)
    {
        $tlds = $tld->active()->get();

        return view('domain', compact('tlds'));
    }

    public function whois(Request $request, Factory $factory)
    {
        $view = view('domain.whois');

        if ($domain = $request->get('domain')) {
            $whois = $factory->createWhois()->lookupDomain($domain);
            $view->with('whois', $whois);
        }

        return $view;
    }
}
