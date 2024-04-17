<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmController extends Controller
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

    public function index()
    {
        if (Auth::check()) {
            $email = Auth::user()->email;
            $data = User::where('email', $email)->first();
            return view('confirm.index', ['data' => $data]);
        } else {
            return redirect()->route('register');
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
    public function delete(Request $request)
    {
        $index = $request->index;
        $user = User::where('email', $index)->first();
        if ($user) {
            $user->delete();
            $data = [
                'status' => 200,
                'message' => '登録がキャンセルされました。',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['status' => 401, 'message' => 'エラーが発生しました。'], 401);
        }
    }
}
