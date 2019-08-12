<?php

namespace App\Http\Controllers;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $users = User::all();

        return view('dashboard',compact('users'));
    }
        public function show(Request $request,$id)
    {
<<<<<<< HEAD
        $users = User::find($id);
=======
        $users = User::paginate(6);
>>>>>>> efbe4d1359d92a8bd07041819124c4b4e1d7c152
        return view('dashboard',compact('users'));
    }
}
