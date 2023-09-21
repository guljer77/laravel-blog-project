<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('admin.modules.category.allCategory',compact('categories'));
    }
    public function add(){
        return view('admin.modules.category.addCategory');
    }
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        return redirect('/admin/all-category')->with('message','Category Added Successfully');
    }
    public function edit($id){
        $category = Category::find($id);
        return view('admin.modules.category.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'required',
        ]);
        Category::find($id)->update([
            'category_name'=>$request->category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->category_name)),
        ]);
        return redirect('/admin/all-category')->with('message','Category Update Successfully');
    }
    public function delete($id){
        Category::find($id)->delete();
        return redirect('/admin/all-category')->with('message','Category Delete Successfully');
    }
}
