<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\User;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::get();
        return view('news.index', ['data' => $data]);
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
        $news_date = $request -> news_date;
        $news_title = $request -> news_title;
        $news_content = $request -> news_content;
        $grades = $request -> grades;
        $gradesString = implode(',', $grades);
        News::create([
            'news_date' => $news_date,
            'news_title' => $news_title,
            'news_content' => $news_content,
            'grades' => $gradesString
        ]);
        $data = [
            'status' => 200,
            'message' => "成果的に登録されました。"
        ];
        return response()->json($data, 200);

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
        $news = News::find($index);
        if ($news) {
            $news->delete();
            $data = [
                'status' => 200,
                'message' => '削除成功',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['status' => 401, 'message' => 'エラーが発生しました。'], 401);
        }
    }
}
