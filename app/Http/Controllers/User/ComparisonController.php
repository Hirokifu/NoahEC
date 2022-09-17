<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComparisonController extends Controller
{
    public function ProductComp(){
        return view('frontend.comparison.comparison');
    }
}
