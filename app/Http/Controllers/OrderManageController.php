<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request -> id;
        $user_info = User::where('id', $id)->first();
        $user_email = $user_info -> email;
        $results = Order::where('email', $user_email)->get();
        $order_info = [];
        foreach ($results as $result) {
            $order_info[] = $result->order_date;
        }
        return view('orderManage.index', ['user_info' => $user_info, 'order_info' => $order_info]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request)
    {
        $change_id = $request -> change_id;
        $change_date = $request -> change_date;
        $change_quantity = $request -> change_quantity;
        $change_user = User::where('id', $change_id)->first();
        $change_email = $change_user -> email;

        $change_order = Order::where('email', $change_email)
                            ->where('order_date', $change_date)
                            ->first();
        if($change_quantity == 0) {
            // dd($change_quantity);
            $change_order->delete();
            $data = [
                'status' => 200,
                'message' => "更新成功"
            ];
            return response()->json($data, 200);
        }
        if($change_quantity == 1) {
            $data = [
                'status' => 200,
                'message' => "更新成功"
            ];
            return response()->json($data, 200);
        } 
        if(!$change_order){
            $data = [
                'status' => 401,
                'message' => "エラーが発生しました。"
            ];
            return response()->json($data, 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
