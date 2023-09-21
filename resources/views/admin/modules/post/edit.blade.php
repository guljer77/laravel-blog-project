@extends('admin.layouts.master')
@section('title','Add-Product')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Post Add</h5>
                <a href="{{route('all-post')}}" class="btn btn-primary">All Post</a>
            </div>
            <div class="card-body">
                <form action="{{ route('update-post',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-1">Post Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="post_title"
                                class="form-control"
                                id="basic-1"
                                value="{{ $post->post_title }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-5">Post Description</label>
                        <div class="col-sm-10">
                            <textarea name="post_des" id="editor" cols="30" rows="15" class="form-control">{{ $post->post_des }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-8">Post Image</label>
                        <div class="col-sm-10">
                            <input
                                type="file"
                                name="post_image"
                                class="form-control"
                                id="basic-8"/>
                            <img src="{{ asset($post->post_image) }}" alt="" width="80" height="60">
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">New Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


