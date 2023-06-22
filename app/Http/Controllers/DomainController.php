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

    public function check(Request $request, Tld $tld, Factory $factory)
    {
        $request->flash();

        $view = view('domain')->with('tlds', $tld->active()->get());

        if (($domain = $request->get('domain')) && preg_match('/^[-a-z0-9]+\.[a-z]{2,6}$/', $domain)) {
            $parts = explode('.', $domain, 2);
            $tld = $tld->where('tld', end($parts))->with('prices')->first();

            $whois = $factory->createWhois();
            try {
                $available = $whois->isDomainAvailable($domain);
            } catch (Iodev\Whois\Exceptions\ServerMismatchException $exception) {
                $available = false;
            }

            $view->with(compact('tld', 'available'));
        }

        return $view;
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
