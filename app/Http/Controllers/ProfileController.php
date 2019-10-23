<?php

namespace App\Http\Controllers;

// use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        // auth()->user()->update($request->all());
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'image'     => 'image',
            'phone'     => 'required',
        ]);
        
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        
        if($request->hasFile('image')){
            File::delete('images/'.$user->image);
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath , $fileName);
            $user->image = $fileName;
        }

        $user->save();


        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }

    public function indexProfile()
    {
        return view('profile.indexProfile');
    }
}
