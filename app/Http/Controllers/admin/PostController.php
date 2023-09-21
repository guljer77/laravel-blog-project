<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $post = Post::orderBy('id','desc')->get();
        return view('admin.modules.post.allPost',compact('post'));
    }
    public function add(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.modules.post.addPost',compact('categories','tags'));
    }
    public function store(Request $request){
        $request->validate([
            'post_title' => 'required|unique:posts',
            'post_des' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required',
            'post_image' => 'required',
        ]);
        function imageUrl($request){
            $image = $request->file('post_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'blogs_'.time().'.'.$extension;
            $directory = 'upload/blog-images/';
            $image->move($directory, $imageName);
            return $directory.$imageName;
        }
        $cat_id = $request->category_id;
        $tag_id = $request->tag_id;
        $category_name = Category::where('id',$cat_id)->value('category_name');
        $tag_name = Tag::where('id',$tag_id)->value('tag_name');
        Post::insert([
            'post_title'=>$request->post_title,
            'post_des'=>$request->post_des,
            'category_id'=>$request->category_id,
            'category_name'=>$category_name,
            'tag_id'=>$request->tag_id,
            'tag_name'=>$tag_name,
            'post_image'=> imageUrl($request),
            'slug'=> strtolower(str_replace(' ','-',$request->post_title)),
        ]);
        Category::where('id',$cat_id)->increment('post_count',1);
        Tag::where('id',$tag_id)->increment('post_count',1);
        return redirect('/admin/all-post')->with('message','Post Added Successfully');
    }
    public function details($id){
        $detail = Post::find($id);
        return view('admin.modules.post.detail',compact('detail'));
    }
    public function edit($id){
        $post = Post::find($id);
        return view('admin.modules.post.edit',compact('post'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'post_title' => 'required',
            'post_des' => 'required',
        ]);
        function imageUrl($request){
            $image = $request->file('post_image');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'blogs_'.time().'.'.$extension;
            $directory = 'upload/blog-images/';
            $image->move($directory, $imageName);
            return $directory.$imageName;
        }

        $image = Post::find($id);
        if($request->file('post_image')){
            if(file_exists($image->post_image)){
                unlink($image->post_image);
            }
            $newImage = imageUrl($request);
        }else{
            $newImage = $image->post_image;
        }
        Post::find($id)->update([
            'post_title'=>$request->post_title,
            'post_des'=>$request->post_des,
            'post_image'=> $newImage,
            'slug'=> strtolower(str_replace(' ','-',$request->post_title)),
        ]);
        return redirect('/admin/all-post')->with('message','Post Update Successfully');
    }
    public function delete($id, $cat_id, $tag_id){
        Post::find($id)->delete();
        Category::where('id',$cat_id)->decrement('post_count',1);
        Tag::where('id',$tag_id)->decrement('post_count',1);
        return redirect('/admin/all-post')->with('message','Post Delete Successfully');
    }
}
