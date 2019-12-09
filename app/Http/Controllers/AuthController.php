<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        $validate['password'] = bcrypt($request->password);
        $user = User::create($validate);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user'=>$user,'access_token'=> $accessToken]);
        // return User::create([
        //     'name' => $data['name'],
        //     'username' => $data['username'],
        //     'email' => $data['email'],
        //     'phone_no' => $data['phone_no'],
        //     'password' => Hash::make($data['password']),
        //     'role' => 'customer',
        //     'api_token' => Str::random(60),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $login = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($login)){

            return response(['message'=>'Invalid credentials']);
        }


        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return view('home')->header(['user'=>auth()->user(),'access_token'=> $accessToken]);
        //return response(['user'=>auth()->user(),'access_token'=> $accessToken]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showlogin()
    {
        return view('login');
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
    public function edit($id)
    {
        //
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
    }
}
