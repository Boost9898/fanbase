<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsDetail extends Controller
{
    public function show()
    {
        $id = request('id');
        $items = \App\NewsItem::all();
        return view('newsDetail', ['id' => $id], ['items' => $items]);
    }
}
