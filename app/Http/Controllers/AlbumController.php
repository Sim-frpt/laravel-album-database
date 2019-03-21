<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        $request->validate([
            'album_cover'=>'nullable',
            'artist'=>'required',
            'album'=>'required',
            'genre'=>'required|alpha',
            'production_year' =>'required|integer',
            'record_label'=>'required',
            'tracklist' =>'nullable',
            'rating' =>'nullable|numeric|between:0,10'
        ]);

        $album = Album::create($request->all());
        return response()->json([
            'message' => 'Great Success, the album was created',
            'album' => $album
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return $album;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'album_cover'=>'nullable',
            'artist'=>'nullable',
            'album'=>'nullable|',
            'genre'=>'nullable',
            'production_year' =>'nullable',
            'record_label'=>'nullable',
            'tracklist' =>'nullable',
            'rating' =>'nullable',
            'album_cover'=>'nullable',
            'tracklist' =>'nullable',
            'rating' =>'nullable'
        ]);

        $album->update($request->all());
        return response()->json([
            'message' => 'Great Success, you updated the album database!',
            'album' => $album
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return response()->json([
            'message' => 'Great success! Album was deleted'
        ]);
    }
}
