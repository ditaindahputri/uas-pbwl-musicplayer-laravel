<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Artist;
use Redirect;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rows = Album::join('tb_artist', 'tb_artist.artist_id', '=', 'tb_album.album_artist_id')->orderBy('tb_album.album_id', 'desc')
                ->get();
        return view('album.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = artist::all();
        return view('album.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'album_artist_id' => 'required',
            'album_name' => 'required'
        ]);

        Album::create($request->all());
        return redirect()->route('album.index')->with('success','Album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row['album'] = Album::find($id);
        $row['artist'] = Artist::all();
        return view('album.edit')->with($row);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            
            'album_name' => 'bail|required|unique:tb_album'
        ],
        [
            'album_name.required' => 'Name Wajib Diisi'
        ]);

        $row = Album::findOrFail($id);
        $row->update([
            
            'album_name' => $request->album_name
        ]);

        return redirect('album');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $row = Album::findOrFail($id);
        $row->delete();

        return redirect('album');
    }
}
