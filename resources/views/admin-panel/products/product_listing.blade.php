@extends('admin-panel.full_view')

@section('content')
    {{-- <div class="main-content"> --}}

    {{-- <div class="page-content"> --}}
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="head text-center mt-1">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-3 text-dark">
                            Products Cart Details
                            {{-- <a href="{{ route('cart') }}"> --}}
                            <a href="#">
                                <i class="fa fa-shopping-cart text-danger" aria-hidden="true"></i>
                                <span class="badge badge-pill badge-light">
                                    {{ count((array) session('cart')) }}</span>
                            </a>
                        </h4>
                    </div>
                    <div class="col-md-6">
                        <h4 class="mb-3 text-dark">
                            Product Listing Page
                        </h4>
                    </div>
                </div>
                <!-- title-head page title -->
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body overflow-auto" style="height: 520px;">
                        <!--write your code here  -->
                        <table id="cart" id="myScrollspy"
                            class="table table-hover dt-responsive nowrap w-100  text-center table-sm">
                            <thead>
                                <tr>
                                    <th style="width:60%">Product Details</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:10%">Quantity</th>
                                    <th style="width:10%" class="text-center">Subtotal</th>
                                    <th style="width:10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                {{-- @dd(session('cart')); --}}
                                @if (session('cart'))
                                    <form action="{{ url('place-order') }}" method="POST" enctype="multipart/form-data"
                                        name="myForm" id="myForm">
                                        @csrf
                                        @foreach (session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp
                                            <tr data-id="{{ $id }}">
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-2 hidden-xs">
                                                            <img src="{{ asset('uploads/products/' . $details['image']['image']) }}"
                                                                width="50" height="50" class="img-responsive" />
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6 class="nomargin">
                                                                <input type="text" name="name[]"
                                                                    value=" {{ $details['name'] }}" style="border: none"
                                                                    size="10">
                                                                <input type="hidden" name="product_id[]"
                                                                    value="{{ $details['product_id'] }}">
                                                            </h6>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="nomargin">
                                                                <input type="text" name="cat_id[]"
                                                                    value=" {{ $details['cat_id'] }}" style="border: none"
                                                                    size="1">
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <p class="nomargin">
                                                                <input type="text" name="subcat_id[]"
                                                                    value=" {{ $details['subcat_id'] }}"
                                                                    style="border: none" size="1">
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-2 text-center">
                                                            {{-- {{ $details['is_drink'] }} --}}
                                                            @if ($details['is_drink'] == 1)
                                                                <p class="nomargin ">

                                                                    <i class="fas fa-hamburger"> <input type="hidden"
                                                                            name="is_drink[]"
                                                                            value=" {{ $details['is_drink'] }}"
                                                                            style="border: none" size="1"></i>
                                                                </p>
                                                            @else
                                                                <p class="nomargin">

                                                                    <i class="fas fa-coffee"> <input type="hidden"
                                                                            name="is_drink[]"
                                                                            value=" {{ $details['is_drink'] }}"
                                                                            style="border: none" size="1"></i>
                                                                </p>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </td>
                                                <td data-th="Price" class="text-center">
                                                    {{-- Rs.{{ $details['price'] }} --}}
                                                    <input type="text" name="price[]" value=" {{ $details['price'] }}"
                                                        style="border: none" size="2">
                                                </td>
                                                <td data-th="Quantity">
                                                    <input type="number" name="quantity[]"
                                                        value="{{ $details['quantity'] }}"
                                                        class="form-control quantity update-cart" />
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    Rs.{{ $details['price'] * $details['quantity'] }}
                                                    <input type="hidden" name="subtotal[]" id="subtotal"
                                                        value="{{ $details['price'] * $details['quantity'] }}">
                                                </td>
                                                <td class="actions" data-th="">
                                                    <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                @endif
                            </tbody>

                            {{-- </form> --}}
                        </table>
                    </div>
                    <tfoot>
                        <div class="row">
                            <div class="col-md-6" style="margin-left:60%; margin-bottom:50px">
                                <hr style="width:50%;text-align:left;margin-left:0">
                                <tr>
                                    <td colspan="5" class="text-right   ">
                                        <h3>
                                            <strong>Total Rs.{{ $total }}</strong>
                                            <input type="hidden" name="total" id="total"
                                                value="{{ $total }}">
                                        </h3>
                                    </td>
                                </tr>
                                {{-- <tr>
                                            <td colspan="5" class="text-right">
                                                <a href="{{ url('product-listing') }}" class="btn btn-warning"><i
                                                        class="fa fa-angle-left"></i> Continue Shopping</a>
                                                <button class="btn btn-success">Place Order</button>
                                            </td>
                                        </tr> --}}
                            </div>
                        </div>
                    </tfoot>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body overflow-auto" style="height: 650px;">
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">All Products</span>
                                </a>
                            </li>

                            @foreach ($category as $row)
                                <li class="nav-item">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab"
                                        href="{{ url('product-listing/' . $row->id) }}" id="#profile1">
                                        <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                        <span class="d-none d-sm-block">{{ $row->name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center text-primary text-bold mt-1">
                                            Sides Section
                                        </p>
                                    </div>

                                    @if ($products->count() > 0)
                                        @foreach ($products as $item)
                                            <div class="col-md-2 border order-2 order-lg-1 mt-lg-0 mb-1"
                                                {{-- data-aos="fade-up" data-aos-delay="100" --}}>
                                                <p class="position-static text-left bold">{{ $item->name }}
                                                </p>
                                                <a href="#" class="continue" id="edit"
                                                    data-id="{{ $item->id }}">
                                                    {{-- <a href="{{ route('add.to.cart', $item->id) }}"> --}}
                                                    <img src="{{ asset('uploads/products/' . $item->image->image) }}"
                                                        alt="" class="img-fluid rounded" width="80%">
                                                </a>
                                                <p class="text-left">
                                                    {{-- <strong>Price:</strong> --}}
                                                    Rs.{{ $item->price }}</p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            <h6 class="text-danger">No Product found...</h6>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="tab-pane" id="profile1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="text-center text-primary text-bold mt-1">
                                            Sides Section
                                        </p>
                                    </div>

                                    @if ($records->count() > 0)
                                        @foreach ($records as $item)
                                            <div class="col-md-2 order-2 order-lg-1 mt-lg-0 mb-2">
                                                <p class="position-static text-center bold">{{ $item->name }}
                                                </p>
                                                <a href="#">
                                                    <img src="{{ asset('uploads/products/' . $item->image->image) }}"
                                                        alt="" class="img-fluid rounded" width="100%">
                                                </a>
                                                <p class="text-center"><strong>Price:
                                                    </strong>Rs.{{ $item->price }}</p>
                                                <p class="btn-holder"><a href="{{ route('add.to.cart', $item->id) }}"
                                                        class="btn btn-warning btn-block text-center" role="button">Add
                                                        to
                                                        cart</a>
                                                </p>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            <h6 class="text-danger">No Product found...</h6>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane" id="messages1" role="tabpanel">
                                <p class="mb-0">
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                    sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                    farm-to-table readymade. Messenger bag gentrify pitchfork
                                    tattooed craft beer, iphone skateboard locavore carles etsy
                                    salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                    Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                    mi whatever gluten-free carles.
                                </p>
                            </div>
                            <div class="tab-pane" id="settings1" role="tabpanel">
                                <p class="mb-0">
                                    Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                    art party before they sold out master cleanse gluten-free squid
                                    scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                    art party locavore wolf cliche high life echo park Austin. Cred
                                    vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                    farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                    mustache readymade keffiyeh craft.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- second row --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!--write your code here  -->
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Logged in User: <code
                                        class="text-uppercase">{{ Auth::User()->name }}</code> </label>
                            </div>
                            <div class="col-md-2">
                                <label class="" for="">Discount: in <code>%</code></label>
                                <input type="text" name="discount" id="discount" value="" min="0"
                                    size="10">
                                <span class="text-danger">
                                    <input type="text" name="total_disc" id="total_disc"
                                        style="border:none; text-danger; color:red">
                                </span>
                            </div>
                            <div class="col-md-2">
                                <label class="" for="">Charges:</label>
                                <input type="text" name="charges" id="charges" value="" size="10">

                            </div>
                            <div class="col-md-2 ">
                                <label class="" for="">Net Total:</label>
                                <input type="text" name="net_total" id="net_total" value="" size="10">

                            </div>

                            <div class="col-md-4 ">
                                <td colspan="5" class="text-right">
                                    {{-- <label for="">More Shopping:</label><br> --}}
                                    <a href="{{ url('product-listing') }}" class="btn btn-warning"><i
                                            class="fa fa-angle-right text-white"></i> Hold Shopping</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-angle-right"></i>
                                        Place Order</a>
                                        <button type="button" class="btn btn-danger reset-btn m-lg-1"><i
                                                class="fa fa-close"></i>Cancel Order</button>
                                </td>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        {{-- </div> --}}

        {{-- ajax code for cart --}}
        <script type="text/javascript">
            $(".update-cart").change(function(e) {
                e.preventDefault();

                var ele = $(this);

                $.ajax({
                    url: '{{ route('update.cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });

            });

            $(".remove-from-cart").click(function(e) {
                e.preventDefault();

                var ele = $(this);

                if (confirm("Are you sure want to remove?")) {
                    $.ajax({
                        url: '{{ route('remove.from.cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.parents("tr").attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });

            // calcualte function in js
            $("#discount").blur(function() {
                var num1 = document.getElementById("total").value;
                // alert(num1);
                var num2 = document.getElementById("discount").value;
                var num2 = num2 / 100;
                // alert(num2);
                var disc = num1 * num2;
                // alert(disc);
                var net_total = num1 - disc;
                // document.getElementById("total_disc").value = disc;
                $("#total_disc").val(disc);
                //  alert(a);
                document.getElementById('net_total').value = net_total;
            });
            $("#charges").blur(function() {

                var a = document.getElementById("charges").value;
                // alert(num3);
                var b = document.getElementById('net_total').value;
                var c = parseInt(a, 10) + parseInt(b, 10);
                // alert(c);
                document.getElementById("net_total").value = c;

            });

            // reset form
            $(document).ready(function() {
                $(".reset-btn").click(function() {
                    $("#myForm").trigger("reset");
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function($) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('body').on('click', '#edit', function() {
                    var id = $(this).data('id');
                    // alert(id);
                    // ajax
                    var html = "";
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/add-to-cart') }}/" + id,
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            $.each(res, function(key, value) {
                                html += '<tr data-id="'+value.id+'">';
                                html += '<td data-th="Product">';
                                html += '<div class="row">';
                                html += '<div class="col-sm-2 hidden-xs">';
                                html +=
                                    '<img src="http://127.0.0.1:8000/uploads/products/'+value.image.image+'" width="50" height="50" class="img-responsive">';
                                html += '</div>';
                                html += '<div class="col-sm-4">';
                                html += '<h6 class="nomargin">';
                                html +=
                                    '<input type="text" name="name[]" value="'+value.name+'" style="border: none" size="10">';
                                html +=
                                    '<input type="hidden" name="product_id[]" value="'+value.product_id+'">';
                                html += '</h6>';
                                html += '</div>';
                                html += '<div class="col-sm-2">';
                                html += '<p class="nomargin">';
                                html +=
                                    '<input type="text" name="cat_id[]" value="'+value.cat_id+'" style="border: none" size="1">';
                                html += '</p>';
                                html += '</div>';
                                html += '<div class="col-sm-2">';
                                html += '<p class="nomargin">';
                                html +=
                                    '<input type="text" name="subcat_id[]" value="'+value.subcat_id+'" style="border: none" size="1">';
                                html += '</p>';
                                html += '</div>';
                                html += '<div class="col-sm-2 text-center">';

                                html += ' <p class="nomargin ">';

                                html +=
                                    ' <i class="fas fa-hamburger"> <input type="hidden" name="is_drink[]" value="'+value.is_drink+'" style="border: none" size="1"></i>';
                                html += '</p>';
                                html += '</div>';

                                html += '</div>';
                                html += '</td>';
                                html += '<td data-th="Price" class="text-center">';

                                html +=
                                    '<input type="text" name="price[]" value="'+value.price+'" style="border: none" size="2">';
                                html += '</td>';
                                html += '<td data-th="Quantity">';
                                html +=
                                    '<input type="number" name="quantity[]" value="'+value.quantity+'" class="form-control quantity update-cart">';
                                html += '</td>';
                                html += '<td data-th="Subtotal" class="text-center">';
                                html += value.price * value.quantity;
                                html +=
                                    ' <input type="hidden" name="subtotal[]" id="subtotal" value="{{ $details['price'] * $details['quantity'] }}">';
                                html +=
                                    '<input type="hidden" name="subtotal[]" id="subtotal" value="'+value.price * value.quantity+'">';
                                html += '</td>';
                                html += '<td class="actions" data-th="">';
                                html +=
                                    '<button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>';
                                html += '</td>';
                                html += '</tr>';
                            });
                            $('tbody').html(html);
                            toastr.success('Added to catalog','Success');
                            //  window.location.reload();
                            // $('#id').val(res.id);

                        }
                    });
                });

            });
        </script>

    @endsection
