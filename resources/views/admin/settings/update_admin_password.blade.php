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
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right"
                                     aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update admin password</h4>
                        <form class="forms-sample">
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
                                <input type="password" class="form-control" name="oldPass" id="oldPass" placeholder="Current Password" required autocomplete="off" onkeyup="return adminCurrentPasswordCheck(this)">
                            </div>
                            <div class="form-group">
                                <label for="newPass">New Password</label>
                                <input type="password" name="newPass" class="form-control" id="newPass" placeholder="New Password" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="conPass">Confirm Password</label>
                                <input type="password" name="conPass" class="form-control" id="conPass" placeholder="Confirm Password" required autocomplete="off">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">
                                    Remember me
                                    <i class="input-helper"></i></label>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
