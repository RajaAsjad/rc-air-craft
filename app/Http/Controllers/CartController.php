<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        if(sizeof($cartItems)==0){
            if(Auth::check()){
                return redirect()->route('index');
            }else{
                return redirect()->route('login');
            }
        }
        return view('website.cart', compact('cartItems'));
    }
    public function addToCart(Request $request)
    {
        if(!Auth::check()){
            return redirect()->back()->with('error', 'Sorry, you must be logged in to participate in Competition.');;
        }
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'answer' => $request->answer,
            'quantity' => $request->quantity,
            'max_competition' => $request->max_competition,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        $itemids = $request->id;
        $quantites = $request->quantity;
        $count= 0;
        foreach($itemids as $row){
            \Cart::update($row,['quantity' => ['relative' => false,'value' => $quantites[$count]],]);
            $count++;
        }
        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->product_id);
        return 1;
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
