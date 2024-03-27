<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use App\Models\Suspension;
use App\Models\Log;
use Illuminate\Http\Request;

class SuspensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('suspension.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $susGrade = $request->susGrade;
        $susDate = $request->susDate;
        $susReason = $request->susReason;
        $totalCount = 0;

        foreach ($susGrade as $eachGrade) {
            $orders = Order::where('c_grade', $eachGrade)
                ->where('order_date', $susDate)
                ->count();
            $totalCount += $orders;
        }

        if ($totalCount) {
            foreach($susGrade as $eachGrade) {
                //Leave log
                $row = Order::where('c_grade', $eachGrade)
                ->where('order_date', $susDate)
                ->first();
                if($row) {
                    $row_email = $row -> email;
                    if($row_email) {
                        $user = User::where('email', $row_email)->first();
                        $log_user = $user -> c_name1;
                        Log::create([
                            'log_date' => $susDate,
                            'log_user' => $log_user,
                            'log_content' => $susReason
                        ]);
                    }
                }

                //Leave suspension history in table by grade and suspension date
                Suspension::create([
                    'c_grade' => $eachGrade,
                    'sus_day' => $susDate,
                ]);
            }
            foreach($susGrade as $eachGrade) {
                //Delete the choosed orders in table Order
                Order::where('c_grade', $eachGrade)
                ->where('order_date', $susDate)
                ->delete();
            }

            $data = [
                'status' => 200,
                'totalCount' => $totalCount
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 401,
                'message' => " 一致するデータが存在しません。"
            ];
            return response()->json($data, 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
