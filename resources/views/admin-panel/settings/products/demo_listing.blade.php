@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="head text-center mt-1">
                        <h1 class="mb-5 text-primary">Demo Page </h1>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title m-2">Selected Item's Details</h4>
                                <p class="card-title-desc">
                                </p>

                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 mt-3">
                                    <thead>
                                        <tr>

                                            <th><code>S.No</code></th>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($data); --}}
                                        {{-- @if (isset($data)) --}}
                                        {{-- @if (count($data) >= 1) --}}
                                        {{-- @foreach ($data as $item) --}}
                                        <tr>
                                            @php
                                                $i = 1;
                                            @endphp
                                            <td>{{ $i++ }}</td>
                                            <td>1</td>
                                            <td>Pepsi 1L</td>
                                            <td>
                                                <input type="text" id="price" name="price" size="2"
                                                    value="80" readonly>
                                            </td>
                                            <td>
                                                <form id='myform' method='POST' class='quantity' action='#'>

                                                    <input type='button' min="1" value='-'
                                                        class='qtyminus minus' field='quantity' onclick="myFunction()" />
                                                    <input type='text' name='quantity' value="1" class='qty'
                                                        id="quantity" />
                                                    <input type='button' value='+' class='qtyplus plus'
                                                        field='quantity' onmouseout="myFunction()" />
                                                </form>
                                            </td>
                                            <td>
                                                <input type="text" id="sub_total" name="sub_total" value=""
                                                    size="2" readonly>

                                            </td>
                                            <td>
                                                {{-- <a href="#" class="btn btn-warning">Edit</a> --}}
                                                {{-- | --}}
                                                <a href="#" class="btn btn-danger">Remove</a>
                                            </td>



                                        </tr>
                                        {{-- @endforeach --}}
                                        {{-- @else --}}
                                        {{-- <tr>
                                                    <td><code>No records found.</code></td>
                                                </tr> --}}
                                        {{-- @endif --}}
                                        {{-- @endif --}}


                                    </tbody>

                                </table>

                                <div class="row mt-5">
                                    <h4 class="text-success">Your Order Details</h4>
                                    <br><br><br>
                                    <label for=""> Logged in: <code>Admin</code> </label>
                                    <br><br>
                                    {{-- <input type="text" name="user_name" id="user_id" value="Admin"> --}}
                                    {{-- <div class="col-md-3 mb-4">
                                        <label for="">Total:</label>
                                        <input type="text" name="total" id="" value="60">
                                    </div> --}}
                                    <div class="col-md-3 mb-4">
                                        <label class="ml-2" for="">Discount:</label>
                                        <input type="text" name="" id="" value="10%">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="">Quantity</label>
                                        <input type="text" name="net_quantity" id="net_quantity" value="5">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="">Net Total:</label>
                                        <input type="text" name="net_total" id="net_total" value="270">
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="">Confirm Your Order</label>
                                        <button type="submit" class="btn btn-primary bx-tennis-ball">Place My
                                            Order</button>
                                    </div>
                                </div>

                                <div class="row mt-4">


                                </div>
                                <br>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title text-center">Choose products of Your choice</h4>
                                <p class="card-title-desc text-center">Search by Category.
                                </p>
                                <div class="heading">
                                    <section id="tabs" class="tabs">
                                        <div class="container" data-aos="fade-up">

                                            <ul class="nav nav-tabs row d-flex">
                                                <li class="nav-item col-3">
                                                    <a class="nav-link active show" data-bs-toggle="tab"
                                                        data-bs-target="#tab-1">
                                                        <i class="ri-gps-line"></i>
                                                        <h5 class="d-none d-lg-block">Products</h5>
                                                    </a>
                                                </li>
                                                <li class="nav-item col-3">
                                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                                                        <i class="ri-body-scan-line"></i>
                                                        <h5 class="d-none d-lg-block">Fast Food</h5>
                                                    </a>
                                                </li>
                                                <li class="nav-item col-3">
                                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                                                        <i class="ri-sun-line"></i>
                                                        <h5 class="d-none d-lg-block">Coffees</h5>
                                                    </a>
                                                </li>
                                                <li class="nav-item col-3">
                                                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                                                        <i class="ri-store-line"></i>
                                                        <h5 class="d-none d-lg-block">Cold Drinks</h5>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane active show" id="tab-1">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-4">
                                                                This is Fast Food Section
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Aaloo </p>
                                                            <img src="assets/images/product/img-15.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Mix Sabzi</p>
                                                            <img src="assets/images/product/img-11.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Kabab</p>
                                                            <img src="assets/images/product/img-14.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Gosht</p>
                                                            <img src="assets/images/product/img-12.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Chawal</p>
                                                            <img src="assets/images/product/img-9.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Macaroni</p>
                                                            <img src="assets/images/product/img-16.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-2">
                                                                This is Coffees Section
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Green</p>
                                                            <img src="assets/images/product/img-38.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Milky</p>
                                                            <img src="assets/images/product/img-32.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">White Coffee</p>
                                                            <img src="assets/images/product/img-33.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Black Coffee</p>
                                                            <img src="assets/images/product/img-37.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Dark Coffee</p>
                                                            <img src="assets/images/product/img-36.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Black Tea</p>
                                                            <img src="assets/images/product/img-39.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-2">
                                                                This is Cold Drinks Section
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink1</p>
                                                            <img src="assets/images/product/img-25.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink2</p>
                                                            <img src="assets/images/product/img-26.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink3</p>
                                                            <img src="assets/images/product/img-19.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink4</p>
                                                            <img src="assets/images/product/img-24.jpeg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink5</p>
                                                            <img src="assets/images/product/img-29.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink6</p>
                                                            <img src="assets/images/product/img-18.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-2">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-4">
                                                                This is Fast Food Section
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Aaloo </p>
                                                            <img src="assets/images/product/img-15.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Mix Sabzi</p>
                                                            <img src="assets/images/product/img-11.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Kabab</p>
                                                            <img src="assets/images/product/img-14.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Gosht</p>
                                                            <img src="assets/images/product/img-12.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Chawal</p>
                                                            <img src="assets/images/product/img-9.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Macaroni</p>
                                                            <img src="assets/images/product/img-16.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-3">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-4">
                                                                This is Coffees Section
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Green</p>
                                                            <img src="assets/images/product/img-38.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Milky</p>
                                                            <img src="assets/images/product/img-32.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">White Coffee</p>
                                                            <img src="assets/images/product/img-33.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Black Coffee</p>
                                                            <img src="assets/images/product/img-37.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Dark Coffee</p>
                                                            <img src="assets/images/product/img-36.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Black Tea</p>
                                                            <img src="assets/images/product/img-39.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-4">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <p class="text-center text-primary text-bold mt-4">
                                                                This is Cold Drinks Section
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink1</p>
                                                            <img src="assets/images/product/img-25.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink2</p>
                                                            <img src="assets/images/product/img-26.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink3</p>
                                                            <img src="assets/images/product/img-19.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink4</p>
                                                            <img src="assets/images/product/img-24.jpeg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink5</p>
                                                            <img src="assets/images/product/img-29.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>
                                                        <div class="col-lg-2 order-2 order-lg-1 mt-3 mt-lg-0"
                                                            data-aos="fade-up" data-aos-delay="100">
                                                            <p class="text-center">Cold Drink6</p>
                                                            <img src="assets/images/product/img-18.jpg" alt=""
                                                                class="img-fluid" width="100">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </section><!-- End Tabs Section -->
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div><!-- row end -->

            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(($) => {

            var p = document.getElementById("price").value;
            document.getElementById("sub_total").value = p;

            $('.quantity').on('click', '.plus', function(e) {
                let $input = $(this).prev('input.qty');
                let val = parseInt($input.val());
                $input.val(val + 1).change();
                // alert(2);
                var x = document.getElementById("price").value;
                var y = document.getElementById("quantity").value;
                // alert(y);
                let z = (x * y);
                // alert(z);
                document.getElementById("sub_total").value = z;


            });

            $('.quantity').on('click', '.minus',
                function(e) {
                    let $input = $(this).next('input.qty');
                    var val = parseInt($input.val());
                    if (val > 0) {
                        $input.val(val - 1).change();
                    }
                    var x = document.getElementById("price").value;
                    var y = document.getElementById("quantity").value;
                    // alert(y);
                    let z = (x * y);
                    // alert(z);
                    document.getElementById("sub_total").value = z;
                });
        });

        function myFunction() {

            var a = document.getElementById("total").value;
            var b = document.getElementById("quantity").value;

            document.getElementById("net_total").value = a;
            document.getElementById("net_quantity").value = b;
        }
    </script>
@endsection
