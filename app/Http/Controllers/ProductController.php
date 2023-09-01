<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //
    public function addProd(){
        $this->authorize('is_admin');
        $categories = Category::all();

        return view('addProduct')->with('categories', $categories);
    }

    public function storeProd(Request $request){
        $this->authorize('is_admin');
        $request->validate([
            'productName' => 'required|unique:products,productName|min:5|max:80',
            'productPrice' => 'required|integer', 
            'quantity' => 'required|integer',
            'image' => 'required|file',
        ]);
        
        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = $request->productName.'.'.$extension;
        $request->file('image')->storeAs('/public/products/', $filename);

        Product::create([
            // request disamain sama di atribute name -> form
            'productName' => $request->productName,
            'categoryId' => $request->category,
            'productPrice' => $request->productPrice,
            'quantity' => $request->quantity,
            'image' => $filename,
        ]);

        return redirect('/');
    }

    public function allProd(){
        $products = Product::all();

        return view('welcome')->with('produk_produk', $products);

    }

    public function prod($id){
        $product = Product::findOrFail($id);

        return view('productDetail')->with('product', $product);
    }

    public function editProduct($id){
        $this->authorize('is_admin');
        $product = Product::findOrFail($id);

        return view('updateProduct')->with('product', $product);
    }

    public function updateProduct($id, Request $request){
        $this->authorize('is_admin');
        $request->validate([
            'productName' => 'required|unique:products,productName|min:5|max:80',
            'productPrice' => 'required|integer', 
            'quantity' => 'required|integer',
            'image' => 'required|file',
        ]);
        $product = Product::findOrFail($id)->update([
            'productName' => $request->productName,
            'productPrice' => $request->productPrice,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);
        return redirect(route('homepage'));
    }

    public function deleteProduct($id){
        $this->authorize('is_admin');
        Product::destroy($id);

        return redirect(route('homepage'));
    }
}
