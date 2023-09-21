<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('admin.modules.post.allPost');
    }
    public function add(){
        return view('admin.modules.post.addPost');
    }
}
