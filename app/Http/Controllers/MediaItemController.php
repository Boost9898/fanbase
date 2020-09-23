<?php

namespace App\Http\Controllers;

use App\Models\MediaItems;
use Illuminate\Http\Request;

class MediaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        WAAROM KENT HIJ DE 'ORDERBY' NIET?
//        $items = MediaItems::orderBy('created_at', 'desc')->get();
        $items = MediaItems::all();
        return view('media', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mediaCreate');
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
            'title' => 'required',
            'description' => 'required',
            'media' => 'required',
        ]);

        $mediaItem = new MediaItems();
        $mediaItem->title = $request->get('title');
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
