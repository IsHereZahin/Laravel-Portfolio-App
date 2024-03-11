@extends('admin.admin_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="card-title">Experience Manage</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">About</a></li>
                            <li class="breadcrumb-item active">Experience</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="action-buttons" style="margin-bottom: 10px; text-align: right;">
                            <a href="{{ route('about.experience.create') }}">
                                <button class="btn btn-info">Add New Experience</button>
                            </a>
                        </div>

                        <div class="row">

                            @if ($experience && count($experience) > 0)
                                @foreach ($experience as $data)
                                    <div class="col-md-6">
                                        <div style="border: 5px solid rgb(245, 245, 245); border-radius: 10px; box-shadow: 5px 5px 5px rgba(124, 124, 124, 0.2);">
                                            <div class="about__education__item" style="padding: 30px;">

                                                <div class="item-header">
                                                    <h3 class="title" style="font-weight: bold;">{{ $data->title }}</h3>
                                                </div>

                                                <h6 class="date" style="color: #949494; font-weight: bold;">{{ $data->duration }}</h6>
                                                <p>{{ $data->description }}</p>

                                                <div class="action-buttons d-flex gap-2">
                                                    <a href="{{ route('about.experience.edit', $data->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form method="POST" action="{{ route('about.experience.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this experience?')">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row" style="height: 65vh; display: flex; justify-content: center; align-items: center;">
                                    <div class="col-md-12">
                                        <div style="text-align: center;">
                                            <p>No experience found</p>
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
</div>

@endsection
