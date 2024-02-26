@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                                <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="card-title">About Multi Image</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
                                            <li class="breadcrumb-item active">Multi Image</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            @php
                            $imageCount = count($multi_image); // Get the number of images from $multi_image
                            $isHidden = $imageCount >= 7 ? 'hidden' : ''; // Set 'hidden' class if count is 7 or more
                        @endphp

                        <div class="button-container" style="text-align: right;">
                            <a href="{{ route('about.multi-image.create') }}"
                               class="btn btn-info sm"
                               style="margin-bottom: 10px"
                               title="Add Image"
                               aria-label="Add New About Multi Image"
                               {{ $isHidden }}> <i class="fas fa-plus"></i> Add Image
                            </a>
                        </div>

                            <thead>
                              <tr>
                                <th>Sl</th>
                                <th>About Multi Image</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @php($i = 1)
                              @foreach($multi_image as $item)
                                <tr>
                                  <td>{{ $i++ }}</td>
                                  <td>
                                    <img src="{{ asset('upload/about/multiimage/' . $item->multi_image) }}" style="width: 60px; height: 60px;">
                                  </td>
                                  <td>
                                    <a href="{{ route('about.multi-image.edit', $item->id) }}" class="btn btn-info btn-lg" title="Edit Data">
                                      <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('about.multi-image.destroy', $item->id) }}" method="POST" class="d-inline">
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

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>


@endsection
