<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        if(Auth::check()) {
            $email = Auth::user()->email;
            $totalOrders = Order::where('email', $email)->pluck('order_date')->toArray(); 
            return view('home', ['totalOrders' => $totalOrders]);
        } else {
            return redirect()->route('login'); 
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            $email = Auth::user()->email;
            $order_dates = $request->order_date;
            if ($order_dates == null) {
                $total_orders = Order::where('email', $email)
                    ->get();
                if ($total_orders->isNotEmpty()) {
                    $total_orders->each->delete();
                }
                $data = [
                    'status' => 200,
                    'message' => '注文がキャンセルされました。',
                ];
                return response()->json($data, 200);
            } else {
                $existing_order = Order::where('email', $email)->get();
                if ($existing_order->isNotEmpty()) {
                    $existing_order->each->delete();
                }
                // dd($order_dates);
                foreach ($order_dates as $order_date) {
                    $orders[] = Order::create([
                        'email' => $email,
                        'order_date' => $order_date
                    ]);
                }
                
                $data = [
                    'status' => 200,
                    'message' => '注文が成功的に登録されました。',
                    'orders' => $orders
                ];
                
                return response()->json($data, 200);
            }
        } else {
            $data = [
                'status' => 401,
                'message' => 'エラーが発生しました。',
            ];
            return response()->json($data, 401);
        }
    }
}
