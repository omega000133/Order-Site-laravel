<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('delivery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function get(Request $request)
    {
        $delivery_date = $request -> delivery_date;
        $emails = Order::where("order_date", $delivery_date)->pluck('email');
        $usersByGrade = [];

        foreach ($emails as $email) {
            // Get users with the current email
            $users = User::where("email", $email)->get();
    
            // Group users by c_grade and retrieve c_name1 and c_name2
            foreach ($users as $user) {
                $usersByGrade[$user->c_grade][] = [
                    'c_name1' => $user->c_name1,
                    'c_name2' => $user->c_name2
                ];
            }
        }
        return response()->json([
            'status' => 200,
            'message' => '成功!',
            'usersByGrade' => $usersByGrade
        ]);
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
