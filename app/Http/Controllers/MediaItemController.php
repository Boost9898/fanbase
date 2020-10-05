<?php

namespace App\Http\Controllers;

use App\Models\MediaItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MediaItems::all();
//        $users = Users::all();
        return view('media', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('mediaCreate', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:4',
            'description' => 'required',
            'media' => 'required|unique:media_items|active_url',
        ]);

        $mediaItem = new MediaItems();
        $mediaItem->title = ucfirst($request->get('title'));
        $mediaItem->category = $request->get('category');
        $mediaItem->description = $request->get('description');
        $mediaItem->media = $request->get('media');

        $mediaItem->save();
        return redirect('media')->with('success', 'Media item toegevoegd aan de database!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
    public function show()
    {
        $id = request('id');
        $items = MediaItems::all();
        return view('mediaId', ['id' => $id], ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
