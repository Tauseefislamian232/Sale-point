@extends('admin-panel.index')


@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <!--write your code here  -->

                        <div class="card">
                            <div class="card-body">


                                <h2 class="card-title-desc">
                                <p class="card-title">Edit Admin Details</p>
                                </h2>
                                 <form id="form1" novalidate method="POST" action="{{ url('update-admin/'.$data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" placeholder="Enter username" required
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{$data->name}}" required autocomplete="name" autofocus >

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" id="useremail" placeholder="Enter email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{$data->email}}" autocomplete="email" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Phone Number</label>
                                            <input type="number" id="phone" placeholder="Enter Phone Number" required
                                                class="form-control @error('name') is-invalid @enderror" name="phone"
                                                value="{{ $data->phone}}" required autocomplete="name" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">User Type</label>
                                            <select name="is_admin" id="is_admin" class="form-control">
                                                <option value="NULL">---</option>
                                                <option value="food">Food</option>
                                                <option value="colddrink">Cold drinks</option>
                                                <option value="coffee">Coffees</option>
                                            </select>
                                            @error('is_admin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">


                                    <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">New-Avatar</label>
                                            <input type="file" id="avatar" placeholder="Enter username" required
                                                class="form-control @error('name') is-invalid @enderror" name="avatar"
                                                autocomplete="name" autofocus>

                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Old-Avatar</label>
                                            <img src="{{asset('uploads/admins/'.$data->avatar)}}" alt="" id="admin-img" width="60px" class="ml-3">

                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">

                                         <div class="col-md-6">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="invalidCheck" required>
                                                <label class="form-check-label" for="invalidCheck">
                                                    Agree to terms and conditions
                                                </label>
                                                <div class="invalid-feedback">
                                                    You must agree before submitting.
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary" type="submit">Submit form</button>
                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div> <!-- card-body -->

                        </div> <!-- end col -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
