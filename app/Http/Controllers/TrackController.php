<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use App\Album;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Track::join('tb_album', 'tb_album.album_id', '=', 'tb_track.track_id_album')
        ->orderBy('tb_track.track_id', 'desc')
        ->get();
        return view('track.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rows = album::all();
        return view('track.create', compact('rows'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'track_name' => 'required',
            'track_id_album' => 'required',
            'track_time' => 'required',
            'track_file' => 'required',
        ]);

        $track = new Track;
        $track->track_name = $request->input('track_name');
        $track->track_id_album = $request->input('track_id_album');
        $track->track_time = $request->input('track_time');

        $track_file = $request->file('track_file');
        $track->track_file = $track_file->getClientOriginalName();
        $track_file->move(public_path('lagu'),$track_file->getClientOriginalName());
        $track->save();
        return redirect()->route('track.index')->with('status', 'Data Berhasil Ditambah!');
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
        $row['track'] = Track::find($id);
        $row['album'] = Album::all();
        return view('track.edit')->with($row);
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
            
            'track_name' => 'bail|required|unique:tb_track',
            'track_id_album' => 'required',
            'track_time' => 'required',
            'track_file' => 'required'
        ],
        [
            'track_name.required' => 'Name Wajib Diisi',
            'track_id_album' => 'required',
            'track_time' => 'required',
            'track_file' => 'required'

        ]);

        $row = Track::findOrFail($id);
        $row->update([
            'track_name' => $request->track_name,
            'track_id_album'=> $request->track_id_album,
            'track_time' => $request->track_time,
            'track_file' => $request->track_file

        ]);

        return redirect('track');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Track::findOrFail($id);
        $row->delete();

        return redirect('track');
    }
}
