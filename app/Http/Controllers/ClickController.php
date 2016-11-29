<?php

namespace App\Http\Controllers;

use App\Click;

class ClickController extends Controller
{
    public function success($id)
    {
        return view('click.success', [
            'info' => Click::findOrFail($id)
        ]);
    }

    public function error($id)
    {
        return view('click.error', [
            'info' => Click::findOrFail($id)
        ]);
    }
}
