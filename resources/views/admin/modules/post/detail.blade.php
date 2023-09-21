@extends('admin.layouts.master')
@section('title','Details Post')
@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Post Details</h5>
                <a href="{{route('all-post')}}" class="btn btn-primary">All Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <tr>
                            <td>Post Title</td>
                            <td>{{ $detail->post_title }}</td>
                        </tr>
                        <tr>
                            <td>Post Description</td>
                            <td>{!! $detail->post_des !!}</td>
                        </tr>
                        <tr>
                            <td>Post Category</td>
                            <td>{{ $detail->category_name }}</td>
                        </tr>
                        <tr>
                            <td>Post Tag</td>
                            <td>{{ $detail->tag_name }}</td>
                        </tr>
                        <tr>
                            <td>Post Image</td>
                            <td><img src="{{ asset($detail->post_image) }}" alt="" width="450" height="250"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

