<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.header-link')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layout._navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('admin.layout._settings-panel')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin.layout._sidebar')
        <!-- partial -->
        <div class="main-panel">
            <div class="row">
                @if(\Illuminate\Support\Facades\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show position-absolute right-0" role="alert">
                        <strong>Error!</strong> {{\Illuminate\Support\Facades\Session::get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show position-absolute right-0" role="alert">
                        <strong>Success!</strong> {{\Illuminate\Support\Facades\Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show position-absolute right-0" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            @yield('content')
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin.layout._footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
@include('admin.layout.script-link')
</body>

</html>


