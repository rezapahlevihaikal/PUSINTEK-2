<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loc_Manage;

class LocManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Loc_Manage $model)
    {
        //
        return view('lokasi.index', ['data' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('lokasi.create');
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
        $loc = new Loc_Manage;
        $loc->nama_gedung = $request->nama_gedung;
        $loc->alamat = $request->alamat;
        $loc->save();

        return redirect()->route('lokasi.index')->withStatus(__('Location successfully created.'));
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
    public function edit(Loc_Manage $lokasi)
    {
        //
        return view('lokasi.edit', compact('lokasi'));
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
        //
        $loc = Loc_Manage::find($id);
        $loc->nama_gedung = $request->nama_gedung;
        $loc->alamat = $request->alamat;
        $loc->save();

        return redirect()->route('lokasi.index')->withStatus(__('Location successfully updated.'));
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
        $loc = Loc_Manage::find($id);
        $loc->delete();

        return redirect()->route('lokasi.index')->withStatus(__('Location successfully deleted.'));
    }
}
