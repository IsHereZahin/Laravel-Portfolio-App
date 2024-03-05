@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="card-title">Blog Manage</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                            <li class="breadcrumb-item active">Index</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button-container" style="text-align: right;">
                            <a href="{{ route('blog.create') }}" class="btn btn-info sm" style="margin-bottom: 10px" title="Add Blog">Create Blog</a>
                        </div>

                        @if ($blog && count($blog) > 0)
                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Blog Category</th>
                                        <th>Tags</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($blog as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->category->blog_category }}</td>
                                            <td>{{ $data->tags }}</td>
                                            <td>
                                                <img src="{{ asset('upload/Blog/' . $data->image) }}" style="width: 60px; height: 60px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('blog.edit', $data->id) }}" class="btn btn-info btn-lg" title="Edit Data">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('blog.destroy', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-lg" title="Delete Data" onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        @else
                            <div class="col-md-12 text-center">
                                <div class="table-container d-flex justify-content-center align-items-center" style="height: 65vh;">
                                    <div class="no-blog-found">
                                        <p>No Blog Found</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

@endsection
