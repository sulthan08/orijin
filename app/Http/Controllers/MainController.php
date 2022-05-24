<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $itemuser = $request->user();
        $data = array('itemuser' => $itemuser);
        return view('partials.navbar-logged', $data);
    }
}
