<?php

namespace App\Http\Controllers\V1;

use App\Models\Album;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AlbumResource;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlbumResource::collection(Album::paginate(2));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
       $album = Album::create($request->all());
       return new AlbumResource($album);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
         return new AlbumResource($album);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->all());
        return new AlbumResource($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete('Album Deleted Successfully...!', 204);
    }
}
