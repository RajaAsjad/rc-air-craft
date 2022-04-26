<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Auth;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:why_choose_us-list|why_choose_us-create|why_choose_us-edit|why_choose_us-delete', ['only' => ['index','store']]);
        $this->middleware('permission:why_choose_us-create', ['only' => ['create','store']]);
        $this->middleware('permission:why_choose_us-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:why_choose_us-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $query = WhyChooseUs::orderby('id', 'desc')->where('id', '>', 0);
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
            return (string) view('admin.why_choose_us.search', compact('models'));
        }
        $page_title = 'All WhyChooseUs';
        $models = WhyChooseUs::orderby('id', 'desc')->paginate(10);
        return View('admin.why_choose_us.index', compact("models","page_title"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $page_title = 'Add WhyChooseUs';
            return View('admin.why_choose_us.create', compact('page_title'));
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
            'title' => 'required|max:100',
            'description' => 'required|max:2000',
        ]);

        $model = new WhyChooseUs();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('why_choose_us.index')->with('message', 'Why Choose Us Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function show(WhyChooseUs $whyChooseUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit WhyChooseUs';
        $model = WhyChooseUs::where('id', $id)->first();
        return View('admin.why_choose_us.edit', compact('model','page_title'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:2000',

        ]);

        $update = WhyChooseUs::where('id', $id)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/why_choose'), $photo);
            $update->image = $photo;
        }

        $update->title = $request->title;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('why_choose_us.index')->with('message', 'Why Choose Us Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhyChooseUs  $whyChooseUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = WhyChooseUs::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
