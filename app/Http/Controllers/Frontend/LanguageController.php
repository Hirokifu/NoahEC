<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Cn(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','cn');
        return redirect()->back();
    }

    public function Jp(){
        session()->get('language');
        session()->forget('language');
        Session::put('language','jp');
        return redirect()->back();
    }

}
