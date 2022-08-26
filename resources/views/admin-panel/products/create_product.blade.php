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

                                <h4 class="card-title">Product Details</h4>
                                <p class="card-title-desc"><br>
                                    <!-- Button trigger modal -->
                                    <button type="button"
                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target=".transaction-detailModal">
                                        Add Record
                                    </button>
                                </p>
                                @if (isset($data))
                                    <table id="datatable-buttons"
                                        class="table table-bordered dt-responsive nowrap w-100 text-center table-sm ">
                                        <thead class="mb-5">
                                            <tr>
                                                <th>S.No</th>
                                                <th>Product Name</th>
                                                <th>Image</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Date</th>
                                                <th>Kitchen</th>
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
                                                        <td>
                                                            <img src="{{ asset('uploads/products/' . $item->image->image) }}"
                                                                alt="" width="50">
                                                        </td>
                                                        <td>{{ $item->category->name }}</td>
                                                        <td>{{ $item->subcategory->name }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>
                                                            @php
                                                                $month = date('d/m/Y', strtotime($item->created_at));
                                                                // dd($month);
                                                                echo $month;
                                                            @endphp
                                                            {{-- {{$item->created_at->format('F Y D')}}

                                                            {{$item->created_at->format('F Y M')}}

                                                            {{$item->created_at->format('F Y L')}}
                                                            {{$item->created_at->diffForHumans()}} --}}

                                                         <td>
                                                            @if ($item->is_drink == 1)
                                                            <i class="fas fa-hamburger">Food</i>
                                                            @else
                                                            <i class="fas fa fa-coffee">Drink</i>
                                                            @endif

                                                        </td>

                                                        @if ($item->status == 'inactive')
                                                            <td style="">
                                                                <button type="button" class="btn btn-danger  btn-sm">
                                                                    {{ $item->status }} </button>
                                                            </td>
                                                        @else
                                                            <td style="">
                                                                <button type="button" class="btn btn-success btn-sm">
                                                                    {{ $item->status }} </button>
                                                            </td>
                                                        @endif

                                                        <td>
                                                            <a href="{{ url('edit-product/' . $item->id) }}"
                                                                class="btn btn-outline-primary btn-sm edit" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            |
                                                            <a href="{{ url('delete-product/' . $item->id) }}"
                                                                class="btn btn-outline-warning btn-sm delete"
                                                                title="SoftDelete"
                                                                onclick="return confirm('Are you sure to delete Record?')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                            |
                                                            <a href="{{ url('product-forceDelete/' . $item->id) }}"
                                                                class="btn btn-outline-danger btn-sm delete"
                                                                title="HardDelete"
                                                                onclick="return confirm('Are you sure to delete Record?')">
                                                                <i class="fas fa-solid fa-ban"></i>
                                                            </a>

                                                        </td>
                                                        {{-- <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->is_admin }}</td> --}}

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
                    <h5 class="modal-title" id="transaction-detailModalLabel">Register New Product</h5>
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
                                <form id="form1" novalidate method="POST" action="{{ route('store-product') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="username" class="form-label">Product Title</label>
                                            <input type="text" id="username" placeholder="Enter Product title" required
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="category" class="form-label">Select Category <code>*</code></label>
                                            <select class="form-control" name="category" id="category">
                                                <option hidden>Choose Category</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="course" class="form-label">Choose Subcategory
                                                <code>*</code></label>
                                            <select class="form-control" name="course" id="course"></select>
                                            @error('course')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="username" class="form-label">Price</label>
                                            <input type="number" id="price" placeholder="Enter Product's Price"
                                                required class="form-control @error('price') is-invalid @enderror"
                                                name="price" value="{{ old('price') }}" required autocomplete="name"
                                                autofocus>

                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="username" class="form-label">Quantity</label>
                                            <input type="number" id="quantity" placeholder="Enter quantity Number"
                                                required class="form-control @error('name') is-invalid @enderror"
                                                name="quantity" value="{{ old('quantity') }}" required
                                                autocomplete="name" autofocus>

                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="username" class="form-label">Choose Product type</label>
                                            <div class="control">
                                                <label class="radio m-lg-3">
                                                    <input type="radio" name="is_drink" value="0" checked>
                                                    Drink Kitchen
                                                </label>
                                                <label class="radio m-lg-3">
                                                    <input type="radio" name="is_drink" value="1">
                                                    Food Kitchen
                                                </label>
                                                <label class="radio m-lg-3" disabled>
                                                    <input type="radio" name="is_drink" disabled>
                                                    Kitchen3
                                                </label>
                                            </div>

                                            @error('is_drink')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="username" class="form-label">Product Image</label>
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
                                    <div class="form-group mt-2">
                                        <button type="submit" form="form1" class="btn btn-primary" id="modal_submit"
                                            value="Submit">Submit</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#category').on('change', function() {
                var categoryID = $(this).val();
                //    alert(categoryID);
                if (categoryID) {
                    $.ajax({
                        url: "{{ url('/getCourse') }}/" + categoryID,
                        type: "GET",
                        //    data : {"_token":"{{ csrf_token() }}"},
                        //    dataType: "json",

                        success: function(data) {
                            if (data) {
                                $('#course').empty();
                                $('#course').append('<option hidden>Choose Course</option>');
                                $.each(data, function(key, course) {
                                    $('#course').append('<option value="' + course.id +
                                        '">' + course.name + '</option>');
                                    // $('select[name="course"]').append('<option value="'+ key +'">' + course.name+ '</option>');
                                });
                            } else {
                                $('#course').empty();
                            }
                        }
                    });
                } else {
                    $('#course').empty();
                }
            });
        });
    </script>

@endsection
