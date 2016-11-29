<?php

namespace App\Http\Controllers;

use App\BadDomain;

class BadDomainController extends Controller
{
    public function index()
    {
        return view('bad-domain.index', [
            'badDomains' => BadDomain::get()
        ]);
    }
}
