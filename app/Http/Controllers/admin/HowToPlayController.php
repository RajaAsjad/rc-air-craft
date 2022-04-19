<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\HowToPlay;
use Illuminate\Http\Request;
use Auth;

class HowToPlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:how_to_play-list|how_to_play-create|how_to_play-edit|how_to_play-delete', ['only' => ['index','store']]);
        $this->middleware('permission:how_to_play-create', ['only' => ['create','store']]);
        $this->middleware('permission:how_to_play-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:how_to_play-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = HowToPlay::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('question', 'like', '%'. $request['search'] .'%');
            }
            if($request['status']!="All"){
                if($request['status']==2){
                    $request['status'] = 0;
                }
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.how_to_play.search', compact('models'));
        }
        $page_title = 'All Categories';
        $models = HowToPlay::orderby('id', 'desc')->paginate(10);
        return View('admin.how_to_play.index', compact("models","page_title"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $page_title = 'Add HowToPlay';
            return View('admin.how_to_play.create', compact('page_title'));
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
            'description' => 'required|max:1000',
        ]);

        $model = new HowToPlay();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/howToPlay'), $photo);
            $model->image = $photo;
        }

        $model->created_by = Auth::user()->id;
        $model->title = $request->title;
        $model->description = $request->description;
        $model->save();

        return redirect()->route('how_to_play.index')->with('message', 'How To Play Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HowToPlay  $howToPlay
     * @return \Illuminate\Http\Response
     */
    public function show(HowToPlay $howToPlay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HowToPlay  $howToPlay
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit HowToPlay';
        $model = HowToPlay::where('id', $id)->first();
        return View('admin.how_to_play.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HowToPlay  $howToPlay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:1000',
        ]);

        $update = HowToPlay::where('id', $id)->first();

        if (isset($request->image)) {
            $photo = date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move(public_path('/admin/assets/images/howToPlay'), $photo);
            $update->image = $photo;
        }

        $update->title = $request->title;
        $update->description = $request->description;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('how_to_play.index')->with('message', 'How To Play Updated Successfully !');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HowToPlay  $howToPlay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = HowToPlay::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
