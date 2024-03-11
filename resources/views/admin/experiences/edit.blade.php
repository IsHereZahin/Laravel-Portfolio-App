@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h3 class="mb-sm-0" style="color: #00808E">Edit Experience Blog</h3>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Experience Blog</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('experience.update', $experience->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <h5 class="text-center mt-5 mb-5">Client Info</h5>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{  asset('upload/experience/blog/' .$experience->image) }}" alt="Image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Image </label>
                                <div class="col-sm-10">
                                    <input name="image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Client</label>
                                <div class="col-sm-10">
                                    <input name="client" class="form-control" type="text" id="example-text-input" value="{{ $experience->client }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input name="category" class="form-control" type="text" id="example-text-input" value="{{ $experience->category }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Project Link</label>
                                <div class="col-sm-10">
                                    <input name="project_url" class="form-control" type="text" id="example-text-input" value="{{ $experience->project_url }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input name="location" class="form-control" type="text" id="example-text-input" value="{{ $experience->location }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input name="date" class="form-control" type="date" id="date" value="{{ $experience->date }}" required>
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="form-group">
                                <h5 class="text-center mt-5 mb-5">Blog Details</h5>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $experience->title }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Front Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="short_description">{{ $experience->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input name="description" class="form-control" type="text" id="example-text-input" value="{{ $experience->description }}" required>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3" style="text-align: right">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
