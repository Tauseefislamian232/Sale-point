@extends('admin-panel.index')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <!--write your code here  -->
                        <table id="cart" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product</th>
                                    <th style="width:10%">Price</th>
                                    <th style="width:8%">Quantity</th>
                                    <th style="width:22%" class="text-center">Subtotal</th>
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
                                                            width="100" height="100" class="img-responsive" />
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h4 class="nomargin">{{ $details['name'] }}</h4>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h5 class="nomargin">{{ $details['cat_id'] }}</h5>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <h6 class="nomargin">{{ $details['subcat_id'] }}</h6>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        {{-- {{ $details['is_drink'] }} --}}
                                                        @if ($details['is_drink'] == 1)
                                                            <h4 class="nomargin">
                                                                <i class="fas fa-hamburger">Food</i>
                                                            </h4>
                                                        @else
                                                            <h4 class="nomargin">
                                                                <i class="fas fa-coffee">Drink</i>
                                                            </h4>
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
                </div>
            </div>
        </div>
    </div>
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
