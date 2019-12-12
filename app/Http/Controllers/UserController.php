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
    
        $this->validate($request, [
            'phone_no' => 'required'
        ]);
        
        $user = \App\User::updateOrCreate([
           'password' =>  bcrypt($request('password')),
           'phone_no' => $request('phone_no'),
        ]);

        alert()->success(__('Profile has been updated.'), __('Update Profile'));

        return redirect()->route('user.show', $user);
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


    public function showAdmin(User $user)
    {
        
        $user = auth()->user();
        //$users = \App\Models\User::with('roles')->role('general_user')->get();
        
        // $d = \App\User::all();
        // $user = $d->where('user_id',$id);
        //->paginate(10); // select * from users
        return view('delivery.index', compact('user'));
    }

    public function updateProfile(Request $request, User $user)
    {   

        $this->validate($request, [
            'phone_no' => 'required'
        ]);
        
        $user = \App\User::updateOrCreate([
           'password' =>  bcrypt($request('password')),
           'phone_no' => $request('phone_no'),
        ]);

        alert()->success(__('Profile has been updated.'), __('Update Profile'));

        return redirect()->route('user.show', $user);
    }
    public function updateAdmin(Request $request, User $user)
    {   
        $this->validate($request, [
        'phone_no' => 'required'
    ]);

        $user->update([
            'password' =>  bcrypt(request('password')),
            'phone_no' => request('phone_no'),

        ]); 
        
        $user = \App\User::updateOrCreate([
           'password' =>  bcrypt($request('password')),
           'phone_no' => $request('phone_no'),
        ]);

        alert()->success(__('Profile has been updated.'), __('Update Profile'));

        return redirect()->route('admin.show', $user);
    }
    public function editAdmin()
    {
        return view('admin.edit', auth()->user());
    }
}
