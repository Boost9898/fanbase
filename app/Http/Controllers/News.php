<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class News extends Controller
{
    public function show()
    {
        $items = \App\NewsItem::all();
        return view('news', ['items' => $items]);
    }
}
