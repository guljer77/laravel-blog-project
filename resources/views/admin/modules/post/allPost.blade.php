@extends('admin.layouts.master')
@section('title','All Post')
@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Manage Post</h5>
                <a href="{{route('add-post')}}" class="btn btn-primary">Add Post</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Sl</th>
                            <th>Post Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($post as $singlePost)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $singlePost->post_title }}</td>
                                <td>{!! substr($singlePost->post_des, 0,50) !!}</td>
                                <td>
                                    <img src="{{ asset($singlePost->post_image) }}" alt="" width="80" height="60">
                                </td>
                                <td>
                                    <a href="{{ route('detail-post',$singlePost->id) }}" class="btn btn-info btn-sm"><i class="bx bx-book-open me-1"></i></a>
                                    <a href="{{ route('edit-post',$singlePost->id) }}" class="btn btn-info btn-sm"><i class="bx bx-edit-alt me-1"></i></a>
                                    <a href="{{ route('delete-post',[$singlePost->id,$singlePost->category_id,$singlePost->tag_id]) }}" class="btn btn-danger btn-sm"><i class="bx bx-trash me-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

