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
                                                        <td>{{ $item->product_with_category->name }}</td>
                                                        <td>{{ $item->product_with_subcategory->name  }}</td>
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

   

@endsection
