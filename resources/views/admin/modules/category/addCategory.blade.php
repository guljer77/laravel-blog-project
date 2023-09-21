@extends('admin.layouts.master')
@section('title','Add-Category')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Category Add</h5>
                <a href="{{route('all-category')}}" class="btn btn-primary">All Category</a>
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
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Category Name</label>
                        <div class="col-sm-10">
                            <input
                                type="text"
                                name="category_name"
                                class="form-control"
                                id="basic-default-company"
                                placeholder="Category Name" />
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">New Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

