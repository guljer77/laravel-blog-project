@extends('admin.layouts.master')
@section('title','All-Category')
@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Manage Category</h5>
                <a href="{{route('add-category')}}" class="btn btn-primary">Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Sl</th>
                            <th>Category Name</th>
                            <th>slug</th>
                            <th>Tag</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>1</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"><i class="bx bx-edit-alt me-1"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="bx bx-trash me-1"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

