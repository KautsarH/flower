<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;

use Session;
use App\Cart;
use App\Occasion;
class ProductController extends Controller
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
        
       // $id = auth()->user()->id;

        $products = Product::all();
        //->paginate(10); // select * from users
        return view('product.index', compact('products'));
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addToCart(Request $request, Product $product)
    {
        $product1 = Product::find($product)->first();
        //dd($product1);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product1, $product1->id);

        $request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        
        $products = Product::all();       
        return view('product.index', compact('products'));
    }


    public function deleteFromCart($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        
        //return view('product.index', compact('products'));
    }


    public function getDeleteFromCart(Product $id)
    {
        dd("Hello");
        $product1 = Product::find($id)->first();
        //dd($product1);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->deleteFromCart($id);

        Session::put('cart',$cart);
        //$request->session()->put('cart',$cart);
        return redirect()->route('product.cart');
    }

    
    

    public function cart()
    {
        if (!Session::has('cart'))
        {
            return view('product.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('product.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function checkout()
    {
        if (!Session::has('cart'))
        {
            return view('product.cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        $occassions = Occasion::all();
        $d = \App\Delivery::all();
        $deliveries = $d->where('user_id',auth()->user()->id);
        return view('product.checkout', ['total' => $total, 'occasions'=> $occassions, 'deliveries' => $deliveries]);
    }
}
