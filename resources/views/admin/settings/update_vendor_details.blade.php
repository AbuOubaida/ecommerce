@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Vendor Details</h3>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($slug) && strtolower($slug) == 'personal' )
        <div class="row justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Personal Information</h4>
                        <form class="forms-sample" method="post" action="{{route("update.vendor.details",['slug'=>'personal'])}}" id="updateAdminInfo" name="updateAdminInfo" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
{{--                                // column 1--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$vendorDetails->name}}" placeholder="Name" required >
                                        <div class="" id="message"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{$vendorDetails->address}}" placeholder="Address" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" value="{{$vendorDetails->country}}" placeholder="Country" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="collection_point_1">Collection Point 1</label>
                                        <input type="text" class="form-control" name="collection_point_1" id="collection_point_1" value="{{$vendorDetails->collection_point_1}}" placeholder="Collection Point 1" >
                                    </div>
                                </div>
{{--                                // column 2--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Email" value="{{$vendorDetails->email}}" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" name="city" id="city" value="{{$vendorDetails->city}}" placeholder="City" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="pincode">Pin code </label>
                                        <input type="text" class="form-control" name="pincode" id="pincode" value="{{$vendorDetails->pincode}}" placeholder="Pincode" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="collection_point_3">Collection Point 3</label>
                                        <input type="text" class="form-control" name="collection_point_3" id="collection_point_3" value="{{$vendorDetails->collection_point_3}}" placeholder="Collection Point 3" >
                                    </div>
                                </div>
{{--                                // column 3--}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" name="mobile" class="form-control" id="mobile" value="{{$vendorDetails->mobile}}" placeholder="Mobile" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" name="state" id="state" value="{{$vendorDetails->state}}" placeholder="State">
                                    </div>
                                    <div class="form-group">
                                        <label for="collection_point_2">Collection Point 2 </label>
                                        <input type="text" class="form-control" name="collection_point_2" id="collection_point_2" value="{{$vendorDetails->collection_point_2}}" placeholder="Collection Point 2" >
                                    </div>
                                    <div class="form-group float-right">
                                        <br>
                                        <button type="submit" class="btn btn-success mr-2" name="update">Update</button>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @elseif(isset($slug) && strtolower($slug) == 'business')
        <div class="row justify-content-center">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Business Information</h4>
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
                                    <label for="mobile">Mobile </label>
                                    <input type="number" name="mobile" class="form-control" id="mobile" value="{{$adminData->mobile}}" placeholder="Mobile" required>
                                </div>
                                <div class="form-group">
                                    <label for="profile">Profile Photo </label>
                                    <input type="file" name="profile" class="form-control" id="profile" onchange="return previewFile(this)">
                                    @if(!empty(\Illuminate\Support\Facades\Auth::guard('admin')->user()->image))
                                        <img id="previewImg" src="{{url("admin/images/uploaded/profile/".Auth::guard('admin')->user()->image)}}" alt="Admin Profile Image" width="20%">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success mr-2" name="update" >Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(isset($slug) && strtolower($slug) == 'bank')
        <div class="row justify-content-center">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Bank Information </h4>
                            <form class="forms-sample" method="post" action="{{route("update.admin.details")}}" id="updateAdminInfo" name="updateAdminInfo" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="text" class="form-control" id="email" placeholder="Email" value="{{$adminData->email}}" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" readonly="readonly" class="form-control" id="type" value="{{$adminData->type}}" placeholder="Type">
                                </div>
                                <div class="form-group">
                                    <label for="name">Name </label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$adminData->name}}" placeholder="Name" required >
                                    <div class="" id="message"></div>
                                </div>
                                <div class="form-group">
                                    <label for="mobile">Mobile </label>
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
        @endif
    </div>
@stop
