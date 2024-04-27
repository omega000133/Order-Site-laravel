<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index() {
        return view('privacyOutside.index');
    }
    
    public function privacy() {
        return view('privacyInside.index');
    }
}


