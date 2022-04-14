<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Question;
use App\Models\Option;
use Illuminate\Support\Facades\Validator;
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
        $categories = Category::orderby('id', 'desc')->where('status', 1)->get();
        return View('admin.product.create', compact('page_title',"categories"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // return $request->short_description;

        $rules = ([
            'name' => ['required','unique:products','max:255'],
            'short_description' => 'max:1000',
            'description' => ['required','max:1000'],
            'image' => ['mimes:jpeg,jpg,png,gif','required','max:10000'], // max 10000kb
        ]);

        $this->validate(request(), $rules);

        $model = new Product();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/product'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->category_slug = $request->category_slug;
        $model->name = $request->name;
        $model->slug = \Str::slug($request->name);
        $model->price = $request->price;
        $model->draw_ends = date('Y-m-d', strtotime($request->draw_ends));
        $model->min_competition = $request->min_competition;
        $model->max_competition = $request->max_competition;
        $model->number_of_winners = $request->number_of_winners;
        $model->short_description = $request->short_description;
        $model->description = $request->description;
        $model->status = 1;
        $model->save();

        $question = Question::create([
            'product_slug' => $model->slug,
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        if(!empty($question)){
            foreach($request->choices as $choice){
                if (!empty($choice)) {
                    Option::create([
                    'question_id'=>$question->id,
                    'choices'=>$choice,
                ]);
            }
            }
        }

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
        $categories = Category::orderby('id', 'desc')->where('status', 1)->get();
        return View('admin.product.edit', compact("details","page_title","categories"));
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
        // return $request;
        $validator = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

            $update = Product::where('slug', $slug)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/product'), $photo);
            $update->image = $photo;
        }

        $update->category_slug = \Str::slug($request->name);
        $update->name = $request->name;
        $update->slug = \Str::slug($request->name);
        $update->price = $request->price;
        $update->draw_ends = date('Y-m-d', strtotime($request->draw_ends));
        $update->min_competition = $request->min_competition;
        $update->max_competition = $request->max_competition;
        $update->number_of_winners = $request->number_of_winners;
        $update->short_description = $request->short_description;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();


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
