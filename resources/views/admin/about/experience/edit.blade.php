@extends('admin.admin_master')
@section('content')

<div class="page-content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" style="height: 80vh">
            <div class="row">
              <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h3 class="mb-sm-0">Edit Experience</h3>

                  <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
                      <li class="breadcrumb-item active">Experience</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif

            <form method="post" action="{{ route('about.experience.update', $data->id) }}">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input name="title" class="form-control" type="text" id="example-text-input" value="{{ $data->title }}" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                  <input name="duration" class="form-control" type="text" id="example-text-input" value="{{ $data->duration }}" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="description" class="form-control" id="example-text-input" required>{{ $data->description }}</textarea>
                </div>
              </div>
              <div class="row mb-3" style="text-align: right">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Experience">
                </div>
              </div>

            </form>

          </div>
        </div>
      </div> </div>

  </div>
</div>

@endsection
