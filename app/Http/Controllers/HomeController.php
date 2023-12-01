<?php

namespace App\Http\Controllers;

use App\Models\Ambit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ambits = Ambit::where('status',1)->get();
       
        $ambits_list = Ambit::where('status',1)->get()->pluck( 'name', 'id');
        return view('home', compact('ambits', 'ambits_list'));
    }
}
