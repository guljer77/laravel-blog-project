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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-1">Post Title</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="post_title"
                                class="form-control"
                                id="basic-1"
                                placeholder="Product Name" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-5">Post Description</label>
                        <div class="col-sm-10">
                            <textarea name="post_des" id="editor" cols="30" rows="15" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-6">Post Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="category_name" id="basic-6" aria-label="Default select example">
                                <option selected>Select Category</option>
                                    <option value="">One</option>
                                    <option value="">One</option>
                                    <option value="">One</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-7">Post Tag</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="tag_name" id="basic-7" aria-label="Default select example">
                                <option selected>Select Tag</option>
                                    <option value="">One</option>
                                    <option value="">One</option>
                                    <option value="">One</option>
                            </select>
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

