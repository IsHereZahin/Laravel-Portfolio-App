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
                                    <h4 class="card-title">Blog Category</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                            <li class="breadcrumb-item active">Category</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="button-container" style="text-align: right;">
                            <a href="{{ route('blog.category.create') }}" class="btn btn-info sm" style="margin-bottom: 10px" title="Add Blog Category">Create Blog Category</a>
                        </div>

                        @if ($blog_category && count($blog_category) > 0)
                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($blog_category as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->blog_category }}</td>
                                            <td>
                                                <a href="{{ route('blog.category.edit', $data->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                                    <i class="fas fa-edit"> Edit</i>
                                                </a>

                                                <form action="{{ route('blog.category.destroy', $data->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm('Are you sure you want to delete this item?')">
                                                        <i class="fas fa-trash-alt"> Delete</i>
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
                                    <div class="no-Blog Category-found">
                                        <p>No Blog Category Found</p>
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
