<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('role', 2)->get();
        return view('userManage.index', ['students' => $students]);
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
    public function show(Request $request)
    {
        $id = $request -> id;
        $user_info = User::where('id', $id)->first();
        if($user_info) {
            $data = [
                'status' => 200,
                'message' => "成功",
                'user_info' => $user_info
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'status' => 401,
                'message' => "その情報が見つかりません。"
            ];
            return response()->json($data, 401);
        }
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
        $c_name1 = $request->c_name1;
        $c_name2 = $request->c_name2;
        $c_grade = $request->c_grade;
        $grade_year = $request->grade_year;
        $p_name1 = $request->p_name1;
        $p_name2 = $request->p_name2;
        $p_phone = $request->p_phone;
        $postcode = $request->postcode;
        $prefecture = $request->prefecture;
        $address = $request->address;
        $building = $request->building;
        $permission = $request->permission;

        $user = User::find($index);
        if ($user) {
            $user->update([
                'email' => $email,
                'password' => $password,
                'c_name1' => $c_name1,
                'c_name2' => $c_name2,
                'c_grade' => $c_grade,
                'grade_year' => $grade_year,
                'p_name1' => $p_name1,
                'p_name2' => $p_name2,
                'p_phone' => $p_phone,
                'postcode' => $postcode,
                'prefecture' => $prefecture,
                'address' => $address,
                'building' => $building,
                'permission' => $permission
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
    public function destroy(string $id)
    {
        //
    }
}
