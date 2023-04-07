<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::all();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->name) && isset($request->description) && isset($request->price) && isset($request->category)) {
            $newProduct = new Product();
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $newProduct->image = $imageName;
            }
            $newProduct->name = $request->name;
            $newProduct->description = $request->description;
            $newProduct->price = $request->price;
            $newProduct->save();
            return redirect()->route('product.index')->with('status', $newProduct->name . 'a ete ajouter avec succes');
        }

        return view('admin.product.create');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
        $product = Product::find($id);
        return view('admin.product.edit',[
            'product'=>$product,
        ]);}

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if (isset($request->name) && isset($request->description) &&  isset($request->price) && isset($request->category)){
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('uploads'), $imageName);
                $product->image = $imageName;
            }
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->update();
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }
}
