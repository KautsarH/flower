<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $users = User::paginate(15);
        return UserResource::collection($users);
    }
    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $user = User::updateOrcreate([
        //     'username' => request('username'),
        //     'password' =>  bcrypt(request('password')),
        //     'email' =>  request('email'),
        //     'phone_no' => request('phone_no'),
        //     'name' => request('name'),
        //     'role' => 'customer',
        // ]); 
        
        // if($user->save()){
        //     //return new UserResource($user);
        //     return "Success create user";
        // }
    }

    public function show($id)
    {
        if (!$id) {
            return "Account doesn't exist";
        }
        try {
        $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return "Account doesn't exist";
        }
        return new UserResource($user);
    }

    public function edit()
    {
        //return "hello";
        return view('users.edit', auth()->user());
    }

    public function update(Request $request,$id)
    {   
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
             return "Account doesn't exist";
        }

        $user->update([
            'password' =>  bcrypt(request('password')),
            'phone_no' => request('phone_no'),

        ]); 

        if($user->save()){
            //return new UserResource($user);
            return "Success update user";
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
             return "Account doesn't exist";
        }
        $user->delete();

       // if($user->delete()){
            //return new UserResource($user);
            return "Success delete user";
        //}
    }

    public function updateProfile(Request $request, User $user)
    {   

        $this->validate($request, [
            'phone_no' => 'required'
        ]);

        //$user = auth()->user();

        $user->update([
            'phone_no' => '11',
            'password' =>  bcrypt(request('password')),

        ]); 

        // if($user->save()){
        //     return "Success update user:";
        //     //return new UserResource($user);
        //     //return back()->with('success_message', 'Profile (and password) updated successfully!');
        // }
        // alert()->success(__('User has been updated.'), __('Update User'));

        // return "Success update user";

        alert()->success('User has been updated.');

        return redirect()->route('home', $user);
    }

    public function showProfile()
    {
        $user = auth()->user();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
