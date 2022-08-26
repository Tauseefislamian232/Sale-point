@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Edit subcategory |
                                    <a href="{{ url('add-category') }}" class="text-primary m-lg-1">Category</a>
                                </h4>
                                <p class="card-title-desc"></p>
                                <form class="needs-validation" novalidate action="{{ url('update-subcategory/' . $data->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="validationCustom01" class="form-label">Edit subcategory</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="validationCustom01" value="{{ $data->name }}" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="useremail" class="form-label">Select One Category</label>
                                            <select name="cat_id" id="cat_id" class="form-control">
                                                <option value="">Select One Major Category</option>
                                                @foreach ($category as $id => $item)
                                                    <option value="{{ $id }}"  {{ $id == $data->cat_id ? 'selected' : '' }}>
                                                        {{ $item }}</option>
                                                @endforeach

                                            </select>

                                            @error('cat_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
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

                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->

                </div>


            </div>
        </div>
    </div>
@endsection
