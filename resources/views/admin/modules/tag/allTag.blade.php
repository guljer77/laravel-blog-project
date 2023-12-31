@extends('admin.layouts.master')
@section('title','All-tag')
@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card my-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Manage Tag</h5>
                <a href="{{route('add-tag')}}" class="btn btn-primary">Add Tag</a>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                        <tr>
                            <th>Sl</th>
                            <th>Tag Name</th>
                            <th>Category Name</th>
                            <th>Post</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @foreach($tags as $tag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tag->tag_name }}</td>
                                <td>{{ $tag->category_name }}</td>
                                <td>{{ $tag->post_count }}</td>
                                <td>
                                    <a href="{{ route('edit-tag',$tag->id) }}" class="btn btn-info btn-sm"><i class="bx bx-edit-alt me-1"></i></a>
                                    <a href="{{ route('delete-tag',$tag->id) }}" class="btn btn-danger btn-sm"><i class="bx bx-trash me-1"></i></a>
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
