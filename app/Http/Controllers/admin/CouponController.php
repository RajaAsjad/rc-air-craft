<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:coupon-list|coupon-create|coupon-edit|coupon-delete', ['only' => ['index','store']]);
        $this->middleware('permission:coupon-create', ['only' => ['create','store']]);
        $this->middleware('permission:coupon-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:coupon-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Coupon::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.coupon.search', compact('models'));
        }
        $page_title = 'All Categories';
        $models = Coupon::orderby('id', 'desc')->paginate(10);
        return View('admin.coupon.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $page_title = 'Add Coupon';
            $coupons = Coupon::orderby('id', 'desc')->where('status', 1)->get();
            return View('admin.coupon.create', compact('page_title','coupons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
            'coupon_type' => 'required|max:100',
            'discount' => 'required|max:100',
            'max_purchase' => 'required|max:100',
            'start_date' => 'required|max:100',
            'expire_date' => 'required|max:100',
        ]);

        $model = new Coupon();
        $model->user_id = Auth::user()->id;
        $model->slug = \Str::slug($request->title);
        $model->title = $request->title;
        $model->coupon_type = $request->coupon_type;
        $model->discount = $request->discount;
        $model->coupon_code = Str::random(6);
        $model->max_purchase = $request->max_purchase;
        $model->start_date = date('Y-m-d', strtotime($request->start_date));
        $model->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $model->status = 1;
        $model->save();

        return redirect()->route('coupon.index')->with('message', 'Coupon Added Successfully !');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Product';
        $details = Coupon::where('slug', $slug)->first();
        return View('admin.Coupon.edit', compact("details","page_title"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
        ]);

        $update = Coupon::where('slug', $slug)->first();
        $update->slug = \Str::slug($request->title);
        $update->title = $request->title;
        $update->coupon_type = $request->coupon_type;
        $update->discount = $request->discount;
        $update->coupon_code = $request->coupon_code;
        $update->max_purchase = $request->max_purchase;
        $update->start_date = date('Y-m-d', strtotime($request->start_date));
        $update->expire_date = date('Y-m-d', strtotime($request->expire_date));
        $update->status = $request->status;
        $update->update();

        return redirect()->route('coupon.index')->with('message', 'Coupon Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $details = Coupon::where('slug', $slug)->first();
        if ($details) {
            $details->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
