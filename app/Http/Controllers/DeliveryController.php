<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
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
       
        $id = auth()->user()->id;
        //$users = \App\Models\User::with('roles')->role('general_user')->get();
        
        $d = \App\Delivery::all();
        $deliveries = $d->where('user_id',$id);
        //->paginate(10); // select * from users
        return view('delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'max:255'],
            'latitude' =>'required',
            'longitude' =>'required',
        ]);

        $data = $request->only('name', 'phone_no', 'latitude','longitude');
        
        $delivery = Delivery::create([
            'name' => $data['name'],
            'phone_no' => $data['phone_no'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'user_id'=> auth()->user()->id,
        ]);

        alert()->success(__('Address has been added.'), __('Add Address'));

        return redirect()->route('delivery.index', $delivery);
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        return view('delivery.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone_no' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'latitude' => 'required',
            'longitude' =>'required',
        ]);

        $data = $request->only('name', 'phone_no', 'latitude','longitude');
        $delivery->update($data);
        
        alert()->success(__('Address has been updated.'), __('Update Address'));

        return redirect()->route('delivery.show', $delivery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //abort_if($delivery->id == auth()->user()->delivery()->id, 403);

        $delivery->delete();

        alert()->success(__('Address has been removed.'), __('Delete Address'));

        return redirect()->route('delivery.index');
    }
}
