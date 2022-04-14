<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Auth;


class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:faq-list|faq-create|faq-edit|faq-delete', ['only' => ['index','store']]);
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        if($request->ajax()){
            $query = Faq::orderby('id', 'desc')->where('id', '>', 0);
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
            return (string) view('admin.faq.search', compact('models'));
        }
        $page_title = 'All Categories';
        $models = Faq::orderby('id', 'desc')->paginate(10);
        return View('admin.faq.index', compact("models","page_title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $page_title = 'Add Faqs';
            return View('admin.faq.create', compact('page_title'));
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
            'question' => 'required|max:100',
            'answer' => 'required|max:1000',
        ]);

        $model = new Faq();
        $model->created_by = Auth::user()->id;
        $model->question = $request->question;
        $model->answer = $request->answer;
        $model->save();

        return redirect()->route('faq.index')->with('message', 'Faqs Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Faqs';
        $model = Faq::where('id', $id)->first();
        return View('admin.faq.edit', compact('model','page_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validator = $request->validate([
            'question' => 'required|max:100',
            'answer' => 'required|max:1000',
        ]);

        $update = Faq::where('id', $id)->first();
        $update->question = $request->question;
        $update->answer = $request->answer;
        $update->status = $request->status;
        $update->update();

        return redirect()->route('faq.index')->with('message', 'Faqs Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Faq::where('id', $id)->first();
        if ($model) {
            $model->delete();
            return true;
        } else {
            return response()->json(['message' => 'Failed '], 404);
        }
    }
}
