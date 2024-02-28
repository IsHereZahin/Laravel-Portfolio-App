@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                    <h3 class="mb-sm-0">Edit Hero Section </h3>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hero</a></li>
                                            <li class="breadcrumb-item active">Manage</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <form method="post" action="{{ route('hero.update') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input name="title" class="form-control" type="text" value="{{ $hero->title ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input name="short_title" class="form-control" type="text" value="{{ $hero->short_title ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Name</label>
                                <div class="col-sm-10">
                                    <input name="button_name" class="form-control" type="text" value="{{ $hero->button_name ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Button Link</label>
                                <div class="col-sm-10">
                                    <input name="button_link" class="form-control" type="text" value="{{ $hero->button_link ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input name="video_url" class="form-control" type="text" value="{{ $hero->video_url ?? ''}}"  id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Hero Image </label>
                                <div class="col-sm-10">
                                    <input name="hero_image" class="form-control" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($hero->hero_image))? url('upload/index/hero/'.$hero->hero_image):url('images/no_image.jpg') }}" alt="Current Hero Image">
                                </div>
                            </div>
                            <!-- end row -->

                            @if ($hero)
                                <div class="row mb-3">
                                    <div class="col-sm-10 offset-sm-2">
                                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                        </form>
                                        <form method="post" action="{{ route('hero.destroy') }}" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
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
