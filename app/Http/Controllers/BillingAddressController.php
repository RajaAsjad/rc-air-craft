<?php

namespace App\Http\Controllers;

use App\Models\BillingAddress;
use Illuminate\Http\Request;

class BillingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.index');
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
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:20',
                /* 'company' => 'required|max:50',
                'country' => 'required|max:50',
                'street' => 'required|max:100',
                'town' => 'required|max:100',
                'postcode' => 'required|max:10',
                'phone' => 'required|max:15',
                'email' => 'required|max:100', */
            ]);

            $model = new BillingAddress();
            $model->first_name = $request->first_name;
            $model->last_name = $request->last_name;
            $model->date_of_birth = $request->date_of_birth;
            $model->company = $request->company;
            $model->country = $request->country;
            $model->street = $request->street;
            $model->town = $request->town;
            $model->postcode = $request->postcode;
            $model->phone = $request->phone;
            $model->email = $request->email;
            $model->save();
            return redirect('check-out')->with('message', 'Successfully !');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(BillingAddress $billingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = BillingAddress::where('id', $id)->first();
        return View('billing_address.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillingAddress $billingAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillingAddress  $billingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillingAddress $billingAddress)
    {
        //
    }
}
