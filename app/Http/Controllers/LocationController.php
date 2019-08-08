<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Validate;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Location $model)
    {
        return view('locations.index', ['Location' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
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
        $loc = new Location;
        $loc->nama_gedung = $request->nama_gedung;
        $loc->lantai_gedung = $request->lantai_gedung;
        $loc->keterangan = $request->keterangan;
        $loc->save();

        return redirect()->route('locations.index')->withStatus(__('Location successfully created.'));
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
    public function edit(Location $location)
    {
        //
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $loc = Location::find($id);
        $loc->nama_gedung = $request->nama_gedung;
        $loc->lantai_gedung = $request->lantai_gedung;
        $loc->keterangan = $request->keterangan;
        $loc->save();

        return redirect()->route('locations.index')->withStatus(__('Location successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $loc = Location::find($id);
        $loc->delete();

        return redirect()->route('locations.index')->withStatus(__('Location successfully deleted.'));
    }
}
