@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="height: 80vh">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h3 class="mb-sm-0">Add Experience</h3>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
                                            <li class="breadcrumb-item active">Experience</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <form method="post" action="{{ route('about.experience.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="duration" class="form-control" type="text" id="example-text-input" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Name</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" type="text" id="example-text-input" required></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3" style="text-align: right">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Experience">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
