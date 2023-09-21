@extends('admin.layouts.master')
@section('title','Add-tag')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Tag Add</h5>
                <a href="{{route('all-tag')}}" class="btn btn-primary">All Tag</a>
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
                <form action="" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Tag Name</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="tag_name"
                                class="form-control"
                                id="basic-default-company"
                                placeholder="Category Name" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Category Name</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="category_name" id="exampleFormControlSelect1" aria-label="Default select example">
                                <option selected>Select Category</option>
                                <option value="">One</option>
                                <option value="">One</option>
                                <option value="">One</option>
                            </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">New Tag</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


