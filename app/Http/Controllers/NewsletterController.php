<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $data = Newsletter::where('status',1)->get();
        return view('website.index', compact('data')); */
        $categories = Category::where('status', 1)->get(['slug']);
        $data = [];
        foreach($categories as $category){
            $data[$category->slug] = Product::where('category_slug', $category->slug)->where('status',1)->get();
        }
        return view('website.index', compact('data'));
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

            $validator = $request->validate([
                'email' => 'required|max:100',
            ]);

            $model = new Newsletter();
            $model->email = $request->email;
            $model->save();
            return redirect('/')->with('message', 'Email send Successfully !');
        }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}

