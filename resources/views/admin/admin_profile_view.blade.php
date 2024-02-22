@extends('admin.admin_master')
@section('content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <div class="card" style="height: 80vh"><br><br>
                    <center>
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($data->profile_image))? url('upload/admin_images/'.$data->profile_image):url('images/no_image.jpg') }}" alt="Card image cap">
                    </center>

                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $data->name }} </h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $data->email }} </h4>
                        <hr>
                        <h4 class="card-title">User Name : {{ $data->username }} </h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

@endsection
