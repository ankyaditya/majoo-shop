<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = \App\Product::paginate(8);
        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {
            $products = \App\Product::where('product_name', 'LIKE', "%$filterKeyword%")->paginate(8);
        }

        return view('welcomes.index', ['products' => $products]);
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
        \Validator::make($request->all(), [
            "name" => "required",
            "phone_number" => "required|digits_between:11,12",
            "address" => "required",
        ])->validate();

        $order_detail = new \App\Order;
        $current_date_time = Carbon::now();
        $order_detail->id_pesanan = $current_date_time->format('YmdHisu');
        $order_detail->name = $request->get('name');
        $order_detail->phone_number = $request->get('phone_number');
        $order_detail->address = $request->get('address');
        $order_detail->product_name = $request->get('product_name');
        $order_detail->product_price = $request->get('product_price');
        $order_detail->product_image = $request->get('product_image');
        $order_detail->order_date = $current_date_time;
        $order_detail->status = "Not Verified";

        $order_detail->save();

        return redirect()->route('welcomes.index')->with('status', 'Success, wait admin for the next process.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = \App\Product::findOrFail($id);

        return view('welcomes.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
