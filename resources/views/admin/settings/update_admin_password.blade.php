@extends('admin.layout.layout')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Admin Password</h3>
{{--                        <h6 class="font-weight-normal mb-0">Update admin password</h6>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update admin password</h4>
                        <div class="row">
                            {{--                For Error message Showing--}}
                            @if ($errors->any())
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            </div>
                            @endif
                            {{--                For Insert message Showing--}}
                            @if (session('success'))
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <div>{{session('success')}}</div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                </div>
                            @endif
                            {{--                For Insert message Showing--}}
                            @if (session('error'))
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <div>{{session('error')}}</div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                </div>
                            @endif
                            @if (session('warning'))
                                <div class="col-12">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <div>{{session('warning')}}</div>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                </div>
                            @endif
                        </div>
                        <form class="forms-sample" method="post" action="{{route("update.admin.password")}}" id="updateAdminPassword" name="updateAdminPassword">
                            @csrf
                            <div class="form-group">
                                <label for="username">Admin Username/Email</label>
                                <input type="text" class="form-control" id="username" placeholder="Username" value="{{$adminDetails->email}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="adminType">Admin Type</label>
                                <input type="email" readonly="readonly" class="form-control" id="adminType" value="{{$adminDetails->type}}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="oldPass">Current Password</label>
                                <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Current Password" required autocomplete="off" onkeyup="return adminCurrentPasswordCheck(this,'message')">
                                <div class="" id="message"></div>
                            </div>
                            <div class="form-group">
                                <label for="newPass">New Password</label>
                                <input type="password" name="newPass" class="form-control" id="newPass" placeholder="New Password" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="conPass">Confirm Password</label>
                                <input type="password" name="conPass" class="form-control" id="conPass" placeholder="Confirm Password" required autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2" name="updatePassword">Submit</button>
                            <button class="btn btn-light" type="reset">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
