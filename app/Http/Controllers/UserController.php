<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use File;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:6|confirmed',
            'role_id'   => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
        ]);

        $users = new User;
        $users->name     = $request->name;
        $users->email    = $request->email;
        $users->password = bcrypt($request->password);
        $users->role_id  = $request->role_id;
        $users->status    = 1;
        $users->location  = 'pusintek'; 

        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath , $fileName);
            $users->image = $fileName;
        }

        $users->save();



        // $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {   
    
        $roles = Role::all();
        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {   
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'password'  => 'confirmed',
            'role_id'   => 'required',
        ]);

        $user = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role_id  = $request->role_id;

        if($request->password != ""){
            $user->password = bcrypt($request->password);
        }

        if($request->hasFile('image')){
            File::delete('images/'.$user->image);
            $file = $request->file('image');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $file->move($destinationPath , $fileName);
            $user->image = $fileName;
        }

        $user->save();
        
        // $user->update(
        //     $request->merge(['password' => Hash::make($request->get('password'))])
        //         ->except([$request->get('password') ? '' : 'password']
        // ));
        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        File::delete('images/'.$user->image);
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
