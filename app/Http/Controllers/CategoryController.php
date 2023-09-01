<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function create(){
        $this->authorize('is_admin');
        return view('addCategory');
    }
        
    public function store(Request $request){
        $this->authorize('is_admin');
        $request->validate([
            'category' => 'required|unique:categories',
            
        ]);
        Category::create([
            'category' => $request->category,
        ]);

        return redirect(route('homepage'));
    }

    public function show(){
        $categories = Category::all();

        return view('showCategory')->with('categories', $categories);
    }

    public function detail($id){
        $category = Category::findOrFail($id);

        return view('categoryDetail')->with('category',$category);
    }

    public function edit($id){
        $this->authorize('is_admin');
        $category = Category::findOrFail($id);

        return view('updateCategory')->with('category',$category);
    }

    public function update($id, Request $request){
        $this->authorize('is_admin');
        $request->validate([
            'category' => 'required|unique:categories',
            
        ]);
        Category::findOrFail($id)->update([
            'category' => $request->category,
        ]);
        return redirect(route('showCat'));
    }

    public function delete($id){
        $this->authorize('is_admin');
        Category::destroy($id);

        return redirect(route('showCat'));
    }
}
