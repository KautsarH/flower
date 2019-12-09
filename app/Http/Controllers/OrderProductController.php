<?php

namespace App\Http\Controllers;

//use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;

class OrderProductController extends Controller
{public function __construct()
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
        $histories = $o->where('user_id',$id);
        //dd($s);
        //->paginate(10); // select * from users
        return view('history.index', compact('histories'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProduct $history)
    {
        return view('history.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProduct $orderProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProduct $orderProduct)
    {
        //
    }
}
