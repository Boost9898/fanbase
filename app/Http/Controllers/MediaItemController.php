<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\MediaItems;
use App\Models\UserLikes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

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

        $totalItems = count(MediaItems::where('status', '=', 'active')->get());

        //return view('media', ['items' => $items, 'categories' => $categories, 'totalItems' => $totalItems]);
        return view('media', compact('items', 'categories', 'totalItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        $user_id = \Auth::id();

        $likesCount = count(UserLikes::where('user_id', 'LIKE', $user_id)->get());

        return view('mediaCreate', compact('categories' , 'likesCount'));
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
        $mediaItem->author = \Auth::id();
        $mediaItem->title = ucfirst($request->get('title'));
        $mediaItem->category = $request->get('category');
        $mediaItem->description = $request->get('description');
        $mediaItem->media = $request->get('media');

        $mediaItem->save();
        return redirect('media')->with('success', 'Media item toegevoegd aan de database!');
    }

    public function like(Request $request)
    {
        $id = $request->get('id');
        $user_id = \Auth::id();
        $currentMedia = MediaItems::where('id', 'LIKE', $id)->get();

        $count = count(UserLikes::where('user_id', 'LIKE', $user_id)->where('media_id', 'LIKE', $id)->get());

        if ($count >= 1) {
            return Redirect::home()->withErrors(['Je hebt al gestemd op dit media item!']);

        } else {
            $currentLikes = $currentMedia[0]['like'];
            $currentLikes = $currentLikes + 1;

            MediaItems::where('id', 'LIKE', $id)->update(['like' => $currentLikes]);

            $userLikes = new UserLikes();
            $userLikes->user_id = \Auth::id();
            $userLikes->media_id = $id;
            $userLikes->save();
        }

        return redirect('media/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = request('id');
        $items = MediaItems::all();
        return view('mediaId', compact('id' , 'items'));
    }

    public function search(Request $request)
    {
        $categories = Categories::all();
        $items = MediaItems::all();
        $searchName = $request->get('searchName');
        $category = $request->get('category');

        $totalItems = count(MediaItems::where('status', '=', 'active')->get());

        if ($category == 'alles') {
            $mediaItems = MediaItems::where('title', 'LIKE', '%' . $searchName . '%')->get();
        } else {
            $mediaItems = MediaItems::where('title', 'LIKE', '%' . $searchName . '%')->where('category', 'LIKE', '%' . $category . '%')->get();
        }

        if (count($mediaItems) > 0) {
            return view('media', ['categories' => $categories, 'items' => $mediaItems, 'totalItems' => $totalItems]);
        } else {
            return view('media', ['categories' => $categories, 'items' => $mediaItems, 'totalItems' => $totalItems])->withErrors(['Geen resultaten gevonden.']);
        }
    }

    public function status(Request $request)
    {
        $status = $request->get('status');
        $id = $request->get('id');

        if ($status == 'active') {
            MediaItems::where('id', '=', $id)
                ->update(['status' => 'inactive']);
        } elseif ($status == 'inactive') {
            MediaItems::where('id', '=', $id)
                ->update(['status' => 'active']);
        }

        return redirect('admin');
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
