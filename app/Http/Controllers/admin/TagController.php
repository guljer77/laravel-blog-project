<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::orderBy('id','desc')->get();
        return view('admin.modules.tag.allTag',compact('tags'));
    }
    public function add(){
        $categories = Category::all();
        return view('admin.modules.tag.addTag',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'tag_name' => 'required|unique:tags',
            'category_id' => 'required',
        ]);
        $cat_id = $request->category_id;
        $category_name = Category::where('id',$cat_id)->value('category_name');
        Tag::insert([
            'tag_name'=>$request->tag_name,
            'category_id'=>$request->category_id,
            'category_name'=>$category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->tag_name)),
        ]);
        Category::where('id',$cat_id)->increment('tag_count',1);
        return redirect('/admin/all-tag')->with('message','Tag Added Successfully');
    }
    public function edit($id){
        $tag = Tag::find($id);
        return view('admin.modules.tag.edit',compact('tag'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'tag_name' => 'required',
        ]);
        Tag::find($id)->update([
            'tag_name'=>$request->tag_name,
            'slug'=>strtolower(str_replace(' ','-',$request->tag_name)),
        ]);
        return redirect('/admin/all-tag')->with('message','Tag Update Successfully');
    }
    public function delete($id){
        $cat_id = Tag::where('id',$id)->value('category_id');
        Tag::find($id)->delete();
        Category::where('id',$cat_id)->decrement('tag_count',1);
        return redirect('/admin/all-tag')->with('message','Tag Delete Successfully');
    }
}
