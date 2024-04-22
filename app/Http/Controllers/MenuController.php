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

        // Check if file1 is PDF
        if ($file1->getClientOriginalExtension() != 'pdf') {
            return response()->json(['message' => '今月のメニュー表はPDF形式である必要があります。'], 400);
        }

        // Check if month2 is 0, then file2 is not required
        if ($month2 == 0 && !$file2) {
            // Save only file1
            $filename1 = date('ymdhis') . '_1.pdf';
            $file1->move('uploads/menu/', $filename1);
            $file1_url = 'uploads/menu/' . $filename1;

            Menu::create([
                'menu1' => $file1_url,
                'month1' => $month1,
                'month2' => $month2
            ]);
            return response()->json(['message' => '登録成功'], 200);
        }

        // Check if file2 is present
        if (!$file2) {
            return response()->json(['message' => '来月のメニュー表を選択してください。'], 400);
        }

        // Check if file2 is PDF
        if ($file2->getClientOriginalExtension() != 'pdf') {
            return response()->json(['message' => '来月のメニュー表はPDF形式である必要があります。'], 400);
        }

        // Save both files
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
    }
}
