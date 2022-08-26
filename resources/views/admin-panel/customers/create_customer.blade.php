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

                                <h4 class="card-title">Customer(s) Details</h4>
                                <p class="card-title-desc"><br>
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                        Add Record
                                    </button>
                                </p>
                                @if (isset($data))
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                <th>Order Type</th>
                                                <th>Joining date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if ($data->count() > 0)
                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>
                                                            <img src="{{ asset('uploads/customers/' . $item->image) }}"
                                                                alt="" width="50">
                                                        </td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->is_drink }}</td>
                                                        <td>
                                                             @php
                                                                 $month = date('d/m/Y', strtotime($item->created_at));
                                                                    // dd($month);
                                                                    echo $month;
                                                            @endphp
                                                        </td>

                                                        <td>
                                                            @if ($item->status == 'inactive')
                                                                <button type="button" class="btn btn-danger  btn-sm">
                                                                    {{ $item->status }} </button>
                                                            @else
                                                                <button type="button" class="btn btn-success btn-sm">
                                                                    {{ $item->status }} </button>
                                                            @endif
                                                        </td>
                                                        </td>

                                                        <td style="width: 100px">
                                                            <a href="{{ url('edit-customer/' . $item->id) }}"
                                                                class="btn btn-outline-warning btn-sm edit" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            |
                                                            <a href="{{ url('delete-customer/' . $item->id) }}"
                                                                class="btn btn-outline-danger btn-sm delete" title="Delete"
                                                                onclick="return confirm('Are you sure to delete Record?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td><code>No record found...</code></td>
                                                </tr>
                                            @endif



                                        </tbody>
                                    </table>
                                @endif
                            </div>

                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Modal -->
    <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog"
        aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="transaction-detailModalLabel">Register New User</h5>
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
                                <form id="form1" novalidate method="POST" action="{{ route('store-customer') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" placeholder="Enter username" required
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" id="useremail" placeholder="Enter email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" autocomplete="email" required>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Phone Number</label>
                                        <input type="number" id="phone" placeholder="Enter Phone Number" required
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
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
                                    <div class="mb-3">
                                        <label for="address" class="form-label">User Address</label>
                                        <textarea name="address" id="address" class="form-control" cols="1" rows="2" >

                                        </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Avatar</label>
                                        <input type="file" id="image" placeholder="Enter username" required
                                            class="form-control @error('image') is-invalid @enderror" name="image"
                                            autocomplete="image" autofocus>

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit" form="form1" class="btn btn-primary " id="modal_submit"
                                        value="Submit">Submit</button>
                                    <button type="button" class="btn btn-secondary" id="modal_close"
                                        data-bs-dismiss="modal">Close</button>
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
