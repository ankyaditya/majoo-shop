<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = \App\Product::all();

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Validator::make($request->all(),[
            "product_name" => "required|min:5|max:50|unique:products",
            "product_price" => "required|digits_between:1,12",
            "product_description" => "required|min:10|max:190",
            "product_image" => "required"
        ])->validate();

        $new_product = new \App\Product;
        $new_product->product_name = $request->get('product_name');
        $new_product->product_price = $request->get('product_price');
        $new_product->product_description = $request->get('product_description');

        if ($request->file('product_image')) {
            $file = $request->file('product_image')->store('product_images', 'public');
            $new_product->product_image = $file;
        }

        $new_product->save();

        return redirect()->route('products.create')->with('status', 'product successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = \App\Product::findOrFail($id);
        return view('products.show', ['product' => $product]);
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

        return view('products.edit', ['product' => $product]);
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
        $product = \App\Product::findOrFail($id);

        \Validator::make($request->all(),[
            "product_name" => "required|min:5|max:50|unique:products,product_name,".$product->id,
            "product_price" => "required|digits_between:1,12",
            "product_description" => "required|min:10|max:190"
        ])->validate();
        
        $product->product_name = $request->get('product_name');
        $product->product_price = $request->get('product_price');
        $product->product_description = $request->get('product_description');

        if($request->file('product_image')){
            if($product->product_image && file_exists(storage_path('app/public/' . $product->product_image))){
                \Storage::delete('public/'.$product->product_image);
            }
            $file = $request->file('product_image')->store('product_images', 'public');
            $product->product_image = $file;
        }

        $product->save();
        return redirect()->route('products.edit', ['id' => $id])->with('status','product succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = \App\Product::findOrFail($id);
        $product->delete();
        \Storage::delete('public/'.$product->product_image);
        return redirect()->route('products.index')->with('status', 'product successfully delete');
    }
}
