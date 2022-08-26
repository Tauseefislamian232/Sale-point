@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <!--write your code here  -->
                        <form id="form1" novalidate method="POST" action="{{ url('update-customer/'.$data->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" id="username" value="{{$data->name}}"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" id="useremail" value="{{$data->email}}"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                autocomplete="email" required>

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
                                            <input type="number" id="phone"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{$data->phone}}" required autocomplete="name" autofocus>

                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Order Type</label>
                                            <select name="is_drink" id="is_drink" class="form-control">
                                                <option value="0">Random</option>
                                                <option value="1">Food</option>
                                                <option value="2">Cold drinks</option>
                                                <option value="3">Coffees</option>
                                            </select>
                                            @error('is_drink')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                         <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Old-Image</label>
                                            <img src="{{asset('uploads/customers/'.$data->image)}}" alt="" id="admin-img" width="60px" class="ml-3">

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">New Image</label>
                                            <input type="file" id="image" placeholder="Enter username" required
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                autocomplete="image" autofocus>

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="address" class="form-label">User Address</label>
                                            <textarea name="address" id="address" class="form-control" cols="1" rows="3" class="text-left" >
                                                {{$data->address}}
                                            </textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <br>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
