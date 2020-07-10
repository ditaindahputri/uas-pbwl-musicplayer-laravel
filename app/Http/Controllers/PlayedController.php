<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Played;
use App\Track;

class PlayedController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Played::join('tb_track', 'tb_track.track_id', '=', 'tb_played.play_id_track')
        ->orderBy('tb_played.play_id', 'desc')
        ->get();
        return view('played.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $rows = track::all();
        return view('played.create', compact('rows'));
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
            'play_id_track' => 'required',
            'play_date' => 'required'
        ]);

        Played::create($request->all());
        return redirect()->route('played.index')->with('success', 'Played created successfully.');
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
        $row['played'] = Played::find($id);
        $row['track'] = Track::all();
        return view('played.edit')->with($row);
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
            'play_date' => 'bail|required|unique:tb_played'
        ],
        [
            'play_date.required' => 'Playdate Wajib Diisi'
        ]);

        $row = Played::findOrFail($id);
        $row->update([
            'play_id_track' => $request->play_id_track,
            'play_date' => $request->play_date
        ]);

        return redirect('played');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Played::findOrFail($id);
        $row->delete();

        return redirect('played');
    }
}
