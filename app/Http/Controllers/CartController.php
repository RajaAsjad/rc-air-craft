<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Coupon;
use App\Models\CouponUsage;
use Session;

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
        $cart_quantity = 0;
        if (isset($cartItems[$request->id])) {
            $cart_quantity = $cartItems[$request->id]->quantity+$request->quantity;
        }
        if(isset($cartItems[$request->id]) && $cart_quantity > $cartItems[$request->id]->max_competition){
            return redirect()->back()->with('max-error', 'The maximum allowed quantity for Popular Ones is '.$cartItems[$request->id]->max_competition.' . So you can not add '.$cart_quantity.' to your cart.');
        }
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

    public function applyCoupon(Request $request)
    {
        if(!Auth::user()){
            return response()->json([
                'status' => 'sign',
            ]);
        }else{
            $details = Coupon::where('coupon_code', $request->coupon_code)->first();
            if($details){
                if($details->expire_date < date('Y-m-d')){
                    return response()->json([
                        'status' => 'expired',
                    ]);
                }else if($details->status==0 ){
                    return response()->json([
                        'status' => 'in-active',
                    ]);
                }else if($details->max_purchase){
                    // return 'good';
                    $usages = CouponUsage::where('user_id', Auth::user()->id)->where('coupon_code', $request->coupon_code)->get();
                    if(!empty($usages) && sizeof($usages)>=$details->max_purchase ){
                        return response()->json([
                            'status' => 'used',
                        ]);
                    }else{
                        CouponUsage::create([
                            'user_id' => Auth::user()->id,
                            'coupon_code' => $request->coupon_code,
                            'usages' => 1,
                        ]);

                        if($details->coupon_type=='fix'){
                            $discount_details = ([
                                'coupon_id' => $details->id,
                                'coupon' => $details->coupon_code,
                                'type' => $details->coupon_type,
                                'discount' => $details->discount,
                            ]);

                            Session::put('discount', $discount_details);

                            $items = \Cart::session('cart_data')->getContent('id');

                            return response()->json([
                                'status'=> 'true',
                            ]);

                        }else if($details->coupon_type=='percent'){
                            $total = \Cart::getTotal();
                            $discount = $total*$details->discount/100;

                            $discount_details = ([
                                'coupon_id' => $details->id,
                                'coupon' => $details->coupon_code,
                                'type' => $details->coupon_type,
                                'discount' => $discount,
                            ]);

                            Session::put('discount', $discount_details);

                            return response()->json([
                                'status'=> 'true',
                            ]);
                        }
                    }
                }
            }else{
                return response()->json([
                    'status' => 'not-found',
                ]);
            }
        }
    }

    //remove coupon
    public function removeCoupon(Request $request)
    {
        $discount = Session::get($request->session_key);

        $usage = CouponUsage::orderby('id', 'desc')->where('coupon_code', $discount['coupon'])->where('user_id', Auth::user()->id)->first();
        if($usage){
            $usage->delete();
            Session::forget($request->session_key);
        }
        return response()->json([
            'status'=> 'true',
        ]);
    }
}
