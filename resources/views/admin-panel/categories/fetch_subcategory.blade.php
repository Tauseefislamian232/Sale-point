@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <!--write your code here  -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <h5><a href="{{ url('add-category') }}" class="text-primary m-lg-1">Category</a>|
                                        Subcategories table
                                     </h5>
                                </h4>

                                @if (isset($data))
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Major Category</th>
                                                <th>Subcategory</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @if ($data->count() > 0)
                                                @foreach ($data->subcategory as $item)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $item->category->name}}</td>
                                                        <td>{{ $item->name }}</td>
                                                        </td>

                                                        <td style="width:100px">
                                                            <a href="{{ url('edit-subcategory/' . $item->id) }}"
                                                                class="btn btn-outline-warning btn-sm edit" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            |
                                                            <a href="{{ url('delete-subcategory/' . $item->id) }}"
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
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
@endsection
