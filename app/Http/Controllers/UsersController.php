<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('administrator')){
            return view('users.create');
        }
        return redirect('/dashboard/users')->with('error', 'Insufficent permissions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!$request->has('name')){
        //     return redirect()->to('/users/create')->with('error', 'Please input your name');
        // }
        if(User::where('email', $request->input('profile_email'))->first()){
            return redirect()->to('/users/create')->with('error', 'Email already in use');
        }
        if(!$request->has('password')){
            return redirect()->to('/users/create')->with('error', 'Password is not strong enough');
        }

        // Create User
        $user = new User;
        $user->name = $request->input('profile_name');
        $user->email = $request->input('profile_email');
        $user->website = $request->input('profile_website');
        $user->github = $request->input('profile_github');
        $user->about = $request->input('profile_about');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->to('/users/'.$user->id.'/edit')->with('success', 'User Created');
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
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
        }elseif(Auth::user()->hasRole('administrator')){
            $user = User::find($id);
            return view('users.edit')->with('user', $user);
        }
        return redirect('/dashboard/users')->with('error', 'Insufficent permissions');
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
       
        $user = User::find($id);

        if($request->has(['password_current', 'password_new', 'password_new_confirm'])) {
            if(Hash::check($request->input('password_current'), $user->password)){
                if(strcmp($request->input('password_current'), $request->input('password_new')) !== 0){
                    if($request->input('password_new') === $request->input('password_new_confirm')){
                        $user->password = Hash::make($request->input('password_new'));
                        $user->save();
                        return redirect()->to('/users/'.$id.'/edit')->with('success', 'Password updated');
                    }else{
                        return redirect()->to('/users/'.$id.'/edit')->with('error', 'New password does not match');
                    }
                }else{
                    return redirect()->to('/users/'.$id.'/edit')->with('error', 'New password is the same as current password');
                }
            }else{
                return redirect()->to('/users/'.$id.'/edit')->with('error', 'Current password is incorrect');
            }
        }elseif($request->has('new_role')){
            $user->roles()->detach([1,2,3,4]);
            $user->roles()->attach($request->input('new_role'));
            return redirect()->to('/users/'.$id.'/edit')->with('success', 'User Role Updated');
        }else{
            $user->name = $request->input('profile_name');
            $user->email = $request->input('profile_email');
            $user->website = $request->input('profile_website');
            $user->github = $request->input('profile_github');
            $user->about = $request->input('profile_about');
            if($request->hasFile('profile_picture')){
                $extension = $request->file('profile_picture')->getClientOriginalExtension();
                $file = $user->id.'.'.$extension;
                $path = $request->file('profile_picture')->storeAs('public/images/profiles', $file);
                $user->profile_picture = $file;
            }
            $user->save();
            return redirect()->to('/users/'.$id.'/edit')->with('success', 'User Profile Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        // Check for correct user
        if(Auth::user()->id == $id){
            $user->delete();
            return redirect('/dashboard/users')->with('success', 'User Deleted');
        }elseif(Auth::user()->hasRole('administrator')){
            $user->delete();
            return redirect('/dashboard/users')->with('success', 'User Deleted');
        }

        return redirect('/dashboard/users')->with('error', 'Insufficent permissions');

        // Check if image is unique
        // if($post->cover_image != 'noimage.jpg'){
        //     // Delete image
        //     Storage::delete('public/images/posts/'.$post->cover_image);
        // }
    }
}
