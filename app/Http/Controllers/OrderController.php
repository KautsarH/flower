<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Carbon;

class OrderController extends Controller
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
        $o = \App\Order::all();
        $orders = $o->where('user_id',$id);
        //dd($s);
        //->paginate(10); // select * from users
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'time' => 'required',
            'deliver_date' => 'required',
        ]);
        
        $order = \App\Order::updateOrCreate([
            'time' => $request->time,
            'status' => '0',
            'total' => $request->total,
            'order_date' =>Carbon\Carbon::now(), 
            'deliver_date' => $request->deliver_date,
            'payment' => $request->payment,
            'remarks' => $request->remarks,
            'user_id' => auth()->user()->id,
            'delivery_id' => $request->delivery_id,
            'occasion_id'=>$request->occasion_id,

        ]);
        //$order->products->attach(//));

        alert()->success(__('Order has been added.'), __('Order more'));

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
