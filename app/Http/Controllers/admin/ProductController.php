<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Product::orderby('id', 'desc')->where('id', '>', 0);
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
            return (string) view('admin.product.search', compact('models'));
        }
        $page_title = 'All Products';
        $models = Product::orderby('id', 'desc')->paginate(10);
        return View('admin.product.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Add Product';
        return View('admin.product.create', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // return $request->expiry_date;
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
        ]);

        $model = new Product();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/product'), $photo);
            $model->image = $photo;
        }

        $model->created_at = Auth::user()->id;
        $model->name = $request->name;
        $model->slug = \Str::slug($request->name);
        $model->short_description = $request->short_description;
        $model->description = $request->description;
        $model->price = $request->price;
        $model->total_inventory = $request->total_inventory;
        $model->remaining_inventory = $request->remaining_inventory;
        $model->type = $request->type;
        $model->expiry_date = date('Y-m-d H:i:s', strtotime($request->expiry_date));
        $model->number_of_competitions = $request->number_of_competitions;
        $model->number_of_winners = $request->number_of_winners;
        $model->status = 1;
        $model->save();

        return redirect()->route('product.index')->with('message', 'Product Added Successfully !');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page_title = 'Edit Product';
        $details = Product::where('slug', $slug)->first();
        return View('admin.product.edit', compact("details","page_title"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$slug)
    {

        $update = Product::where('slug', $slug)->first();
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/product'), $photo);
            $update->image = $photo;
        }

        $update->name = $request->name;
        $update->slug = \Str::slug($request->name);
        $update->short_description = $request->short_description;
        $update->description = $request->description;
        $update->price = $request->price;
        $update->total_inventory = $request->total_inventory;
        $update->remaining_inventory = $request->remaining_inventory;
        $update->type = $request->type;
        $update->expiry_date = date('Y-m-d H:i:s', strtotime($request->expiry_date));
        $update->number_of_competitions = $request->number_of_competitions;
        $update->number_of_winners = $request->number_of_winners;
        $update->status = $request->status;
        $update->save();


        return redirect()->route('product.index')->with('message', 'Product Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $Product = Product::where('slug', $slug)->first();
        if ($Product) {
            $Product->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
