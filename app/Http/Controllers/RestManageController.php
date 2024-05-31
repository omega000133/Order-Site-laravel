<?php

namespace App\Http\Controllers;
use App\Models\Rest;
use Illuminate\Http\Request;

class RestManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rest0 = Rest::where('c_grade', "0")->get();
        $rest1 = Rest::where('c_grade', "1")->get();
        $rest2 = Rest::where('c_grade', "2")->get();
        $rest3 = Rest::where('c_grade', "3")->get();
        $rest4 = Rest::where('c_grade', "4")->get();
        $rest5 = Rest::where('c_grade', "5")->get();
        $rest6 = Rest::where('c_grade', "6")->get();
        $rest7 = Rest::where('c_grade', "7")->get();
        $rest8 = Rest::select('rest_day')
                ->groupBy('rest_day')
                ->havingRaw('COUNT(DISTINCT c_grade) = 8')
                ->get();
                        
        return view("restManage.index",[
            'rest0' => $rest0,
            'rest1' => $rest1,
            'rest2' => $rest2,
            'rest3' => $rest3,
            'rest4' => $rest4,
            'rest5' => $rest5,
            'rest6' => $rest6,
            'rest7' => $rest7,
            'rest8' => $rest8,
        ]);
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
        $c_grade = $request -> c_grade;
        $rest_days = $request -> rest_day;
        if(!is_null($c_grade)) {
            if($c_grade == 8) {
                for($i = 0; $i <= 7; $i++) {
                    foreach($rest_days as $rest_day) {
                        Rest::create([
                            'c_grade' => $i,
                            'rest_day' => $rest_day
                        ]);
                    }
                }
            } else {
                foreach($rest_days as $rest_day) {
                    // dd($rest_day);
                    Rest::create([
                        'c_grade' => $c_grade,
                        'rest_day' => $rest_day
                    ]);
                }
            }
            $data = [
                'status' => 200,
                'message' => "追加成功"
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
        $c_grade = $request -> c_grade;
        $rest_day = $request -> rest_day;
        if($c_grade != null) {
            if($c_grade == 8) {
                for($i = 0; $i <= 7; $i++) {
                    Rest::where('c_grade', $i)
                        ->where('rest_day', $rest_day)
                        ->delete();
                }
            } else {
               Rest::where('c_grade', $c_grade)
                    ->where('rest_day', $rest_day)
                    ->delete();
            }
            $data = [
                'status' => 200,
                'message' => "削除成功"
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
}
