<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
                Order::where('c_grade', $eachGrade)
                ->where('order_date', $susDate)
                ->delete();
            }
            //Leave log
            Log::create([
                'log_date' => $susDate,
                'log_user' => "管理者",
                'log_content' => $susReason
            ]);

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
