<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();

        return view('product_view',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_creation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);





        $input = $request->all();
        if ($image = $request->file('product_image')) {
            $destinationPath = 'image/';
           $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        }
    
        Product::create($input);

        return redirect('/product')->with('success', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product_edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product)
    {
      

        $request->validate([
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $input = $request->all();
  
        if ($image = $request->file('product_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['product_image'] = "$profileImage";
        }else{
            unset($input['product_image']);
        }
          
        $product->update($input);
    
        return redirect('/product')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
         
        return redirect('/product')->with('success', true);
    }
}
