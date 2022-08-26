@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="head text-center mt-1">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-3 text-dark">
                                    Products Cart Details
                                    <a href="{{ route('cart') }}">
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
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <!--write your code here  -->
                        <table id="cart" class="table table-hover dt-responsive nowrap w-100  text-center table-sm"">
                            <thead class="">
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
                                                        <h6 class="nomargin">{{ $details['name'] }}</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <p class="nomargin">{{ $details['cat_id'] }}</p>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <p class="nomargin">{{ $details['subcat_id'] }}</p>
                                                    </div>
                                                    <div class="col-sm-2 text-center">
                                                        {{-- {{ $details['is_drink'] }} --}}
                                                        @if ($details['is_drink'] == 1)
                                                            <p class="nomargin ">
                                                                <i class="fas fa-hamburger">Food</i>
                                                            </p>
                                                        @else
                                                            <p class="nomargin">
                                                                <i class="fas fa-coffee">Drink</i>
                                                            </p>
                                                        @endif
                                                    </div>

                                                </div>
                                            </td>
                                            <td data-th="Price">Rs.{{ $details['price'] }}</td>
                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>
                                            <td data-th="Subtotal" class="text-center">
                                                Rs.{{ $details['price'] * $details['quantity'] }}</td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <h3><strong>Total Rs.{{ $total }}</strong></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">
                                        <a href="{{ url('product-listing') }}" class="btn btn-warning"><i
                                                class="fa fa-angle-left"></i> Continue Shopping</a>
                                        <button class="btn btn-success">Checkout</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-body">
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
                                                    <div class="col-md-2 order-2 order-lg-1 mt-lg-0 mb-2" data-aos="fade-up"
                                                        data-aos-delay="100">
                                                        <p class="position-static text-center bold">{{ $item->name }}
                                                        </p>
                                                        <a href="#">
                                                            <img src="{{ asset('uploads/products/' . $item->image->image) }}"
                                                                alt="" class="img-fluid rounded" width="100%">
                                                        </a>
                                                        <p class="text-center"><strong>Price:
                                                            </strong>Rs.{{ $item->price }}</p>
                                                        <p class="btn-holder"><a
                                                                href="{{ route('add.to.cart', $item->id) }}"
                                                                class="btn btn-warning btn-block text-center"
                                                                role="button">Add to
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

                                    <div class="tab-pane" id="profile1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-center text-primary text-bold mt-1">
                                                    Sides Section
                                                </p>
                                            </div>

                                            @if ($records->count() > 0)
                                                @foreach ($records as $item)
                                                    <div class="col-md-2 order-2 order-lg-1 mt-lg-0 mb-2"
                                                        data-aos="fade-up" data-aos-delay="100">
                                                        <p class="position-static text-center bold">{{ $item->name }}
                                                        </p>
                                                        <a href="#">
                                                            <img src="{{ asset('uploads/products/' . $item->image->image) }}"
                                                                alt="" class="img-fluid rounded" width="100%">
                                                        </a>
                                                        <p class="text-center"><strong>Price:
                                                            </strong>Rs.{{ $item->price }}</p>
                                                        <p class="btn-holder"><a
                                                                href="{{ route('add.to.cart', $item->id) }}"
                                                                class="btn btn-warning btn-block text-center"
                                                                role="button">Add to
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
            </div>
        </div>

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
        </script>

    @endsection
