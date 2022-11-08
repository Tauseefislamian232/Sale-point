@extends('admin-panel.master')

@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('settings') }}" class="text-success btn-lg"><i class="fa fa-cog">Settings</i></a>
                            <h3 class="mx-auto w-100 text-white mt-2">Product Categories List</h3>
                            {{-- <i class="fa fa-question-circle ml-auto"></i> --}}
                            <a href="{{ route('home') }}" class="text-success btn-lg"><i
                                    class="fa fa-home">Dashboard</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form1" novalidate method="POST" action="{{ url('update-product/' . $data->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Product Name</label>
                                    <input type="text" id="username"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $data->name }}" required autocomplete="name" autofocus>
                                    {{-- <!-- <input type="hidden" name="id" id="{{ $data->id }}"> --> --}}
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Choose Product type</label>
                                    <div class="form-group">
                                        <label class="radio m-lg-3">
                                            <input type="radio" name="is_drink" value="0"
                                                {{ $data->is_drink == '0' ? 'checked' : '' }}>
                                            Drink Kitchen
                                        </label>
                                        <label class="radio m-lg-3">
                                            <input type="radio" name="is_drink" value="1"
                                                {{ $data->is_drink == '1' ? 'checked' : '' }}>
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
                            {{-- @dd($category); --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category" class="form-label">Select Category <code>*</code></label>
                                    <select class="form-control" name="category" id="category">
                                        <option hidden>Choose Category</option>
                                       
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $data->cat_id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    {{-- @foreach ($category as $id => $item)
                                                    <option value="{{ $id }}"  {{ $id == $data->cat_id ? 'selected' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach --}}
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 {{-- @dd($data); --}}
                                <div class="col-md-6 mb-3">
                                    <label for="course" class="form-label">Choose Subcategory
                                        <code>*</code> </label>
                                    <select class="form-control" name="course" id="course">
                                        <option value="">Select</option>
                                        @foreach ($data->product_with_category->category_with_subcategory as $sub_cat)
                                            <option value="{{ $sub_cat->id }}"
                                                {{ $data->subcat_id == $sub_cat->id ? 'selected' : '' }}>
                                                {{ $sub_cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('course')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Product Price</label>
                                    <input type="number" id="phone"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $data->price }}" required autocomplete="price" autofocus>

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="useremail" class="form-label">Product Quantity</label>
                                    <input type="number" id="useremail"
                                        class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                        value="{{ $data->quantity }}" autocomplete="email" required>

                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">New Image</label>
                                    <input type="file" id="avatar"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        autocomplete="image" autofocus>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="form-label">Old-Image</label>
                                    <img src="{{ asset('uploads/products/' . $data->product_with_image->image) }}" alt=""
                                        id="admin-img" width="60px" class="ml-3">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required>
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


