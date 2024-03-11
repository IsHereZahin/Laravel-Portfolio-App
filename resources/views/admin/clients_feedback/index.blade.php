@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title">Clients Feedback</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Feedback</a></li>
                            <li class="breadcrumb-item active">Index</li>
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
                            <a href="{{ route('feedback.create') }}" class="btn btn-info sm" style="margin-bottom: 10px" title="Add feedback">Create Feedback</a>
                        </div>

                        @if ($feedback && count($feedback) > 0)
                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Massage</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($feedback as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->message }}</td>
                                            <td>
                                                <img src="{{ asset('upload/clients_feedback/'. $data->image) }}" style="width: 60px; height: 60px;">
                                            </td>
                                            <td>
                                                <a href="{{ route('feedback.edit', $data->id) }}" class="btn btn-info btn-lg" title="Edit Data">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <form action="{{ route('feedback.destroy', $data->id) }}" method="POST" class="d-inline">
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
                                    <div class="no-feedback-found">
                                        <p>No Clients Feedback Found</p>
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
