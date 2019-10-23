<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Validate;
use App\User;
use Auth;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::orderBy('created_at','DSC')->where('created_by', Auth::user()->id )->get();
        
        // if(count($locations) > 0){
        //     $res['message'] = "success";
        //     $res['values'] = $locations;
        //     return response($res);
        // }
        // else{
        //     $res['message'] = "empty";
        //     return response($res);
        // }

        return view('locations.index', compact('locations'));
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
        // $tanggal = date("m/d/Y");
        // dd($tanggal);
        $request->validate([
            'status'      => 'required',
            'lantai_gedung'     => 'required',
            'keterangan' => 'required'
        ]);

        $user = User::find(Auth::user()->id);
        $user->status = $request->status;
        $user->location = $request->ip();
        $user->save();
        
        $loc = new Location;
        $loc->created_by = Auth::user()->id;
        $loc->nama_gedung = $request->ip();
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
        $user = User::find($id);
        $location = Location::orderBy('created_at','DSC')->where('created_by' , $id)->get();
        return view('locations.show',compact('location','user'));
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
