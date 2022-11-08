@extends('admin-panel.master')

@section('content')

    <div class=" bg-light">
        {{-- style="background-image: url('{{ asset('assets/images/bg-image.jpg') }}'); height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover; padding-bottom:50px"> --}}
        <div class="container">
            <!-- start page title -->
            <div class="row">
                <div class="col">
                    <!--write your code here  -->
                    <div class="row">
                        <div class="col p-0">
                            <div class="card overflow-hidden">
                                <div class="bg-primary bg-soft">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="text-primary p-3">
                                                <h3 class="text-primary">Welcome Back !</h3>
                                                <h5>User Profile Information</h5>
                                            </div>
                                        </div>
                                        <div class="col-4 align-self-end">
                                            <img src="{{ asset('assets/images/profile-img.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="avatar-md profile-user-wid mb-4 cover">
                                            <img src="{{ asset('assets/images/icons8-user-100.png') }}" alt=""
                                                class="img-thumbnail rounded-circle" >
                                        </div>
                                        {{-- <h5 class="font-size-15 text-truncate">{{ $data->name }}</h5>

                                        <p class="text-muted mb-0 text-truncate">{{ $data->email }}</p> --}}

                                        <h4 class="card-title ">Personal Information</h4>
                                        <div class="pt-2">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>{{ $data->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>(123) 123 1234</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>{{ $data->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td>California, United States</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mt-2 justify-content-center">
                                                <a href="{{ route('home') }}"
                                                    class="btn btn-dark btn-md text-white btn-sm">Dashboard </a>
                                                <a href="javascript: void(0);"
                                                    class="btn btn-primary waves-effect waves-light btn-sm"
                                                    data-bs-toggle="modal" data-bs-target=".transaction-detailModal3">
                                                    Edit Profile
                                                </a>
                                                <a href="javascript: void(0);"
                                                    class="btn btn-success waves-effect waves-light btn-sm"
                                                    data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                                    Change Password

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Transaction Modal -->

    <!-- Change Password -->
    <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #d6dbf8">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap">
                            <thead>

                            </thead>
                            <tbody>
                                <form id="form1" novalidate method="POST" method="POST"
                                    action="{{ route('changePasswordPost') }}">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 offset-">
                                                <div class="panel panel-default">
                                                    <h2></h2>

                                                    <div class="panel-body">
                                                        @if (session('error'))
                                                            <div class="alert alert-danger">
                                                                {{ session('error') }}
                                                            </div>
                                                        @endif
                                                        @if (session('success'))
                                                            <div class="alert alert-success">
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif
                                                        @if ($errors)
                                                            @foreach ($errors->all() as $error)
                                                                <div class="alert alert-danger">{{ $error }}</div>
                                                            @endforeach
                                                        @endif
                                                        <form class="form-horizontal" method="POST"
                                                            action="{{ route('changePasswordPost') }}">
                                                            {{ csrf_field() }}

                                                            <div
                                                                class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                                <label for="new-password"
                                                                    class="col-md-12 control-label">Current Password</label>

                                                                <div class="col-md-12 mb-3">
                                                                    <input id="current-password" type="password"
                                                                        class="form-control" name="current-password"
                                                                        required>

                                                                    @if ($errors->has('current-password'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('current-password') }}</strong>
                                                                        </span>
                                                                    @endif

                                                                </div>
                                                            </div>

                                                            <div
                                                                class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                                <label for="new-password"
                                                                    class="col-md-12 control-label">New Password</label>

                                                                <div class="col-md-12 mb-3">
                                                                    <input id="new-password" type="password"
                                                                        class="form-control" name="new-password" required>

                                                                    @if ($errors->has('new-password'))
                                                                        <span class="help-block">
                                                                            <strong>{{ $errors->first('new-password') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>

                                                            </div>

                                                            <div class="form-group">
                                                                <label for="new-password-confirm"
                                                                    class="col-md-12 control-label">Confirm New
                                                                    Password</label>

                                                                <div class="col-md-12 mb-3">
                                                                    <input id="new-password-confirm" type="password"
                                                                        class="form-control"
                                                                        name="new-password_confirmation" required>
                                                                </div>

                                                            </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 mb-3 offset-1 ">
                                        <button type="submit" form="form1" class="btn btn-primary " id="modal_submit"
                                            value="Submit"> Change Password</button>
                                        <button type="button" class="btn btn-secondary" id="modal_close"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Update profile  -->
    <div class="modal fade transaction-detailModal2" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #d6dbf8">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Change Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap">
                            <thead>

                            </thead>
                            <tbody>
                                <form id="update_user" class="form-horizontal" method="POST"
                                    action="{{ url('update-user/' . $data->id) }}">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 offset-">
                                                <div class="panel panel-default">
                                                    <h2></h2>

                                                    <div class="panel-body">


                                                        <div
                                                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-12 control-label">User
                                                                Name:</label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" value="{{ $data->name }}"
                                                                    class="form-control" name="name" required>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label for="email" class="col-md-12 control-label">User
                                                                Email:</label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" value="{{ $data->email }}"
                                                                    class="form-control" name="email" required>

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 mb-3 offset-1 ">
                                        <button type="submit" form="update_user123" class="btn btn-primary "
                                            id="modal_submit23" value="Submit"> Update Record</button>
                                        <button type="button" class="btn btn-secondary" id="modal_close"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Update profile --Personal info  -->
    <div class="modal fade transaction-detailModal3" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #d6dbf8">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Change Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap">
                            <thead>

                            </thead>
                            <tbody>
                                <form id="update_user123" class="form-horizontal" method="POST"
                                    action="{{ url('update-user/' . $data->id) }}">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 offset-">
                                                <div class="panel panel-default">
                                                    <h2></h2>

                                                    <div class="panel-body">

                                                        <div
                                                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-12 control-label">Full
                                                                Name: <span
                                                                    class="text-muted">{{ $data->name }}</span></label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" placeholder="" class="form-control"
                                                                    name="name" required>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label for="email" class="col-md-12 control-label">User
                                                                Email:<span
                                                                    class="text-muted">{{ $data->email }}</span></label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" placeholder="" class="form-control"
                                                                    name="email" required>

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                    </div>
                </div>
                <div class="col-md-11 mb-3 offset-1 ">
                    <button type="submit" form="update_user" class="btn btn-primary " id="modal_submit"
                        value="Submit"> Update Record</button>
                    <button type="button" class="btn btn-secondary" id="modal_close"
                        data-bs-dismiss="modal">Close</button>
                </div>
                </form>
                </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- end modal -->
    <!-- Update profile -->
    <div class="modal fade transaction-detailModal3" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                 <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p> --}}

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap">
                            <thead>

                            </thead>
                            <tbody>
                                <form id="update_user" class="form-horizontal" method="POST"
                                    action="{{ url('update-user/' . $data->id) }}">
                                    @csrf
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-md-12 offset-">
                                                <div class="panel panel-default">
                                                    <h2></h2>

                                                    <div class="panel-body">


                                                        <div
                                                            class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                            <label for="name" class="col-md-12 control-label">User
                                                                Name:</label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" value="{{ $data->name }}"
                                                                    class="form-control" name="name" required>
                                                                <input type="hidden" name="id"
                                                                    value="{{ $data->id }}">
                                                                @if ($errors->has('name'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                            <label for="email" class="col-md-12 control-label">User
                                                                Email:</label>

                                                            <div class="col-md-12 mb-3">
                                                                <input type="text" value="{{ $data->email }}"
                                                                    class="form-control" name="email" required>

                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-11 mb-3 offset-1 ">
                                        <button type="submit" form="update_user" class="btn btn-primary "
                                            id="modal_submit" value="Submit"> Update Record</button>
                                        <button type="button" class="btn btn-secondary" id="modal_close"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection


<script>
    function togglePassword() {
        var x = document.getElementById("new-password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
