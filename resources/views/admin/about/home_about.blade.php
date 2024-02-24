@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="height: 80vh">

                        @if ($about)
                            <h4 class="card-title">Edit About Section</h4>
                        @else
                            <h4 class="card-title">Create About Section</h4>
                        @endif

                        <form method="post" action="{{ route('home.about.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $about->title ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" value="{{ $about->short_title ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <input name="short_description" class="form-control" type="text" value="{{ $about->short_description ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Name</label>
                                <div class="col-sm-10">
                                    <input name="button_name" class="form-control" type="text" value="{{ $about->button_name ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Button URL</label>
                                <div class="col-sm-10">
                                    <input name="button_url" class="form-control" type="text" value="{{ $about->button_url ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            @if ($about)
                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                        </form>
                                        <form method="post" action="{{ route('home.about.delete') }}" style="display: inline;">
                                            @csrf
                                            @method('POST')
                                            <input type="submit" class="btn btn-danger waves-effect waves-light" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Create">
                                    </div>
                                </div>
                            @endif


                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
