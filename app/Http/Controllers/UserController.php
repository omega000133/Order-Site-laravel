<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $email = Auth::user()->email;
            $my_info = User::where('email', $email)->first();
            return view('user.index', ['my_info' => $my_info]);
        } else {
            return redirect()->route('login');
        }
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
        $payment_num = $request->payment_num;
        $order_num = $request->order_num;
        if (Auth::check()) {
            $email = Auth::user()->email;
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->payment_num = $payment_num;
                $user->order_num = $order_num;
                $user->save();
                return response()->json(['message' => '登録成功'], 200);
            } else {
                return response()->json(['message' => 'エラーが発生しました。'], 401);
            }
        } else {
            return response()->json(['message' => 'エラーが発生しました。'], 401);
        }
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
        $index = $request->index;
        $email = $request->email;
        $password = $request->password;
        $p_name1 = $request->p_name1;
        $p_name2 = $request->p_name2;
        $p_phone = $request->p_phone;
        $postcode = $request->postcode;
        $prefecture = $request->prefecture;
        $address = $request->address;
        $building = $request->building;
        $card = $request->card;

        $user = User::find($index);
        if ($user) {
            $user->update([
                'email' => $email,
                'password' => $password,
                'p_name1' => $p_name1,
                'p_name2' => $p_name2,
                'p_phone' => $p_phone,
                'postcode' => $postcode,
                'prefecture' => $prefecture,
                'address' => $address,
                'building' => $building,
                'card' => $card
            ]);

            $data = [
                'status' => 200,
                'message' => '更新成功',
                'user' => $user
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 401,
                'message' => 'エラーが発生しました',
            ];
            return response()->json($data, 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
    }
}
