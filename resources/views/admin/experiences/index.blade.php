@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title">Experience Blog</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Experience</a></li>
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="button-container" style="text-align: right;">
                            <a href="{{ route('experience.create') }}" class="btn btn-info sm" style="margin-bottom: 10px" title="Add experience">Create Experience Blog</a>
                        </div>

                        @if ($experience && count($experience) > 0)
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($experience as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->client }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->category }}</td>
=                                            <td>
                                                <img src="{{ asset('upload/experience/blog/' . $data->image) }}" style="width: 60px; height: 60px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('experience.edit', $data->id) }}" class="btn btn-info btn-lg" title="Edit Data">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('experience.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                    <div class="no-experience-found">
                                        <p>No Experience Blog Found</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
