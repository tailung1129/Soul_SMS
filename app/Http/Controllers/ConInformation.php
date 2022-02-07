<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConInformation extends Controller
{
    //
    public function index()
    {
        return view('information');
    }

    public function fnSendInformation(Request $request)
    {
        var_dump($request->numberarray[0]);die();
    }
}
