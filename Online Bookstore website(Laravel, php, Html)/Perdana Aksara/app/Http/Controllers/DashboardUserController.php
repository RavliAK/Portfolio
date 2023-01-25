<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.users.index' ,[
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|min:1|max:90',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'is_admin'=>'nullable',
        ]);

        // if($request->file('image')){
        //     $userData['image'] = $request->file('image')->store('user-images');
        // }
        
        // $userData['user_id'] = auth()->user()->id;
        
        
        User::create($userData);
        
        return redirect('/dashboard/users')->with('success','New user has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',[
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|min:1|max:90',
            // 'username' => 'required|unique:users',
            // 'email' => 'required|unique:users',
            'password' => 'required',
            'is_admin'=>'nullable',
        ];

        


        if($request->username != $user->username){
        $rules['username'] = 'required|unique:users';
        }

        if($request->email != $user->email){
        $rules['email'] = 'required|unique:users';
        }

        $userData = $request->validate($rules);

        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $userData['image'] = $request->file('image')->store('book-images');
        // }

        // $userData['user_id'] = auth()->user()->id;
        // $userData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        User::where('id',$user->id)->update($userData);
        
        return redirect('/dashboard/users')->with('success','User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // if($user->image){
        //     Storage::delete($user->image);
        // }

        User::destroy($user->id);
        
        return redirect('/dashboard/users')->with('success','User has been deleted');
    }

    
}
