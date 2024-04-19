<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        return view('menu.index');
    }

    public function menu_upload(Request $request)
    {
        $file1 = $request->file('file1');
        $file2 = $request->file('file2');
        $month1 = $request->input('month1');
        $month2 = $request->input('month2');

        if ($file1->getClientOriginalExtension() == 'pdf' && $file2->getClientOriginalExtension() == 'pdf') {
            $filename1 = date('ymdhis') . '_1.pdf';
            $filename2 = date('ymdhis') . '_2.pdf';
            $file1->move('uploads/menu/', $filename1);
            $file2->move('uploads/menu/', $filename2);

            $file1_url = 'uploads/menu/' . $filename1;
            $file2_url = 'uploads/menu/' . $filename2;

            Menu::create([
                'menu1' => $file1_url,
                'month1' => $month1,
                'menu2' => $file2_url,
                'month2' => $month2
            ]);
            return response()->json(['message' => '登録成功'], 200);
        } else {
            return 'ファイル形式エラー';
        }
    }
}
