<?php

namespace App\Http\Controllers;

use App\Models\Categories;
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
        $categories = Categories::all();
        return view('media', ['items' => $items], ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
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

    public function search(Request $request)
    {
        $categories = Categories::all();
        $searchName = $request->get('searchName');
        $category = $request->get('category');

        if ($category == 'alles') {
            $mediaItems = MediaItems::where('title', 'LIKE', '%' . $searchName . '%')->get();
        } else {
            $mediaItems = MediaItems::where('title', 'LIKE', '%' . $searchName . '%')->where ('category', 'LIKE', '%' . $category . '%')->get();
        }


        if (count($mediaItems) > 0) {
            return view('media', ['categories' => $categories], ['items' => $mediaItems]);
        } else {
            return view('media', ['categories' => $categories], ['items' => $mediaItems])->withMessage('No Details found. Try to search again !');
        }
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
