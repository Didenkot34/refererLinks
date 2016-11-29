<?php

namespace App\Http\Controllers;

use App\Click;

class HomeController extends Controller
{

    /**
     * Show the application dashboard with info about clicks
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'clicks' => Click::get()
        ]);
    }
}
