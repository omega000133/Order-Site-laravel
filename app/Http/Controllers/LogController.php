<?php

namespace App\Http\Controllers;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index() {
        $logs = Log::get();
        return view('log.index',['logs' => $logs]);
    }
}
