<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.showProduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('product.createProduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_category_id' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $category_id = $request->product_category_id;

        $category_name = Category::where('id', $category_id)->value('category_name');

        $image = $request->file('product_image');
        $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move(public_path('productImages/'), $productImage);
        $img_url = 'productImages/'. $productImage;

        Product::insert([
            'product_name' => $request->product_name,
            'product_short_desc' => $request->product_short_desc,
            'product_long_desc' => $request->product_long_desc,
            'product_price' => $request->product_price,
            'product_category_name' => $category_name,
            'product_category_id' => $category_id,
            'product_image' => $img_url,
            'product_slug' => strtolower(str_replace(" ","-", $request->category_name)),
        ]);

        Category::where('id',$category_id)->increment('category_product_count', 1);

        return redirect()->route('product.index')->with('msg','New Product Added Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
