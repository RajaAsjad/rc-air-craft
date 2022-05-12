<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','store']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Order::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('name', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.order.search', compact('models'));
        }
        $page_title = 'All Order';
        $models = Order::orderby('id', 'desc')->paginate(10);
        return View('admin.order.index', compact("models","page_title"));
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
        if(!Auth::user()){
            return redirect()->route('login');
        }

        $cartItems = \Cart::getContent();
        if(sizeof($cartItems)==0){
            return redirect()->route('/');
        }

        do{
            $order_number = random_int(100000, 999999);
        }while(Order::where('order_number', $order_number)->first());

        $total_amount = \Cart::getTotal();
        $net_amount = $total_amount;
        if(Session::has('discount')){
            $discount = Session::get('discount');
            $net_amount = $total_amount-$discount['discount'];
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'order_number' =>$order_number,
            'coupon_id' => isset($discount)?$discount['coupon_id']:null,
            'payment_method' =>null,
            'total_amount' =>$total_amount,
            'discount_type' =>isset($discount)?$discount['type']:null,
            'discount_amount' =>isset($discount)?$discount['discount']:null,
            'net_amount' =>$net_amount,
            'order_date' =>date('Y-m-d'),
            'order_status' =>'succeeded',
        ]);

        if($order){
            foreach ($cartItems as $item) {
                $product = Product::where('id', $item->id)->first();
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_slug' => $product->slug,
                    'category_slug' => $product->category_slug,
                    'price' => $product->price,
                    'quantity' => $item->quantity,
                    'discount_type' =>isset($discount)?$discount['type']:null,
                    'discount_amount' =>isset($discount)?$discount['discount']:null,
                    'tax' => null,
                    'sub_total' => $product->price*$item->quantity,
                    'order_status' => 'succeeded',
                    'order_date' => date('Y-m-d'),
                ]);
            }

            return redirect()->route('check-out');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_title = 'Order Details';
        $model = OrderDetail::where('order_id', $id)->first();
        return view('admin.order.show' , compact('model' , 'page_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
