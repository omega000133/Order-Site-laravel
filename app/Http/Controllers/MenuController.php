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
    
        if ($file1->getClientOriginalExtension() == 'pdf' && $file2->getClientOriginalExtension() == 'pdf') {
            $filename1 = date('ymdhis') . '_1.pdf';
            $filename2 = date('ymdhis') . '_2.pdf';
            $file1->move('uploads/menu/', $filename1);
            $file2->move('uploads/menu/', $filename2);

            $file1_url = 'uploads/menu/' . $filename1;
            $file2_url = 'uploads/menu/' . $filename2;

            Menu::create([
                'menu1' => $file1_url,
                'menu2' => $file2_url
            ]);
        } else {
            return 'ファイル形式エラー';
        }
    }
}
