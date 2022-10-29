@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Settings</h3>
{{--                        <h6 class="font-weight-normal mb-0">Update admin password</h6>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update admin Details</h4>
                        <form class="forms-sample" method="post" action="{{route("update.admin.details")}}" id="updateAdminInfo" name="updateAdminInfo" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" value="{{$adminData->email}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" readonly="readonly" class="form-control" id="type" value="{{$adminData->type}}" placeholder="Type">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$adminData->name}}" placeholder="Name" required >
                                <div class="" id="message"></div>
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="number" name="mobile" class="form-control" id="mobile" value="{{$adminData->mobile}}" placeholder="Mobile" required>
                            </div>
                            <div class="form-group">
                                <label for="profile">Profile Photo</label>
                                <input type="file" name="profile" class="form-control" id="profile" onchange="return previewFile(this)">
                                @if(!empty(\Illuminate\Support\Facades\Auth::guard('admin')->user()->image))
                                    <img id="previewImg" src="{{url("admin/images/uploaded/profile/".Auth::guard('admin')->user()->image)}}" alt="Admin Profile Image" width="20%">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success mr-2" name="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
