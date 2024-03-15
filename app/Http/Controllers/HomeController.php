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
        if (Auth::check()) {
            if (Auth::user()->role == 2) {
                $email = Auth::user()->email;
                $totalOrders = Order::where('email', $email)->pluck('order_date')->toArray();
                return view('home1', ['totalOrders' => $totalOrders]);
            } else if (Auth::user()->role == 1) {
                return view('home2');
            }
        } else {
            return redirect()->route('login');
        }
    }



    public function store(Request $request)
    {
        if (Auth::check()) {
            $email = Auth::user()->email;
            $c_grade = Auth::user()->c_grade;
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
                        'c_grade' => $c_grade,
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

    // SELECT
//     c_grade,
//     order_date,
//     COUNT(*) AS order_count
// FROM
//     orders
// GROUP BY
//     c_grade,
//     order_date
// ORDER BY
//     c_grade,
//     order_date;

    public function get(Request $request)
    {
        $orderCounts = Order::select('c_grade', 'order_date', \DB::raw('COUNT(*) as order_count'))
            ->groupBy('c_grade', 'order_date')
            ->orderBy('c_grade')
            ->orderBy('order_date')
            ->get();

        $orderByDates = Order::select('order_date', \DB::raw('COUNT(*) as orderByDate'))
            ->groupBy('order_date')
            ->orderBy('order_date')
            ->get();

        if (Auth::user()->role == 1) {
            $result1 = [];
            foreach ($orderCounts as $orderCount) {
                $cGrade = $orderCount->c_grade;
                $orderDate = $orderCount->order_date;
                $count = $orderCount->order_count;

                if (!isset($result1[$cGrade])) {
                    $result1[$cGrade] = [];
                }

                $result1[$cGrade][$orderDate] = $count;
            }

            $result2 = [];
            foreach ($orderByDates as $orderByDate) {
                $order_date = $orderByDate -> order_date;
                $counts = $orderByDate -> orderByDate;
                if(!isset($result2[$order_date])) {
                    $result2[$order_date] = [];
                }
                $result2[$order_date] = $counts;
            } 

            $data = [
                'status' => 200,
                'orderCount' => $result1,
                'orderByDate' => $result2
            ];
            return response()->json($data, 200);

        } else {
            $data = [
                'status' => 401,
                'message' => "エラーが発生しました。"
            ];
            return response()->json($data, 401);
        }
    }
}
