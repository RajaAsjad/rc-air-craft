<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Auth;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:about_us-list|about_us-create|about_us-edit|about_us-delete', ['only' => ['index','store']]);
        $this->middleware('permission:about_us-create', ['only' => ['create','store']]);
        $this->middleware('permission:about_us-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:about_us-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = AboutUs::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('heading', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.about_us.search', compact('models'));
        }
        $page_title = 'All AboutUs';
        $models = AboutUs::orderby('id', 'desc')->paginate(10);
        return View('admin.about_us.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $page_title = 'Add AboutUs';
            return View('admin.about_us.create', compact('page_title'));
        }
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
            'heading' => 'required|max:100',
            'description' => 'required|max:2000',
        ]);

        $model = new AboutUs();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/about_us'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->heading = $request->heading;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('about_us.index')->with('message', 'About Us Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit AboutUs';
        $model = AboutUs::where('id', $id)->first();
        return View('admin.about_us.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'heading' => 'required|max:100',
            'description' => 'required|max:2000',

        ]);

        $update = AboutUs::where('id', $id)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/about_us'), $photo);
            $update->image = $photo;
        }

        $update->heading = $request->heading;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('about_us.index')->with('message', 'About Us Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = AboutUs::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
