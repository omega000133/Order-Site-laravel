<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index() {
        return view('termOut.index');
    }
    public function term() {
        return view('termInside.index');
    }
}
