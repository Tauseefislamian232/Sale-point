@extends('admin-panel.master')
<style>
    /* Prevent image stretching as it's resized */
    .card-img-top {
        object-fit: cover;
        height: 10vw;
        width: 10vw;
    }

    /* Make all cards in row the same height */
    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .row>div[class*='col-'] {
        display: flex;
    }

    /* Hover effects */
    .card {
        transition: -webkit-transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01, 1.01);
    }

    /* Responsive design for image heights */
    @media (min-width: 576px) {
        .card-img-top {
            height: 10vw;
            width: 10vw;
        }
    }

    @media (min-width: 768px) {
        .card-img-top {
            height: 10vw;
            width: 10vw;
        }
    }

    @media (min-width: 992px) {
        .card-img-top {
            height: 10vw;
            width: 10vw;
        }
    }

    @media (min-width: 1200px) {
        .card-img-top {
            height: 10vw;
            width: 10vw;
        }
    }
</style>
@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center bg-dark text-white">
                        <div class="d-flex align-items-center">
                            <h3 class="mx-auto w-100 text-white mt-2">Welcome to Settings Page</h3>
                            {{-- <i class="fa fa-question-circle ml-auto"></i> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/products.png') }}" alt="Card image cap"
                                        width="100%">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">Register Product</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".create-product-modal">Add
                                        </button>
                                        <a href="{{ route('add-product') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/product_category.png') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">Product Categories</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".product-category-modal">Add
                                        </button>
                                        <a href="{{ route('add-category') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/icons8-sorting-64.png') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">Product Subcategories</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".product-subcategory-modal">Add
                                        </button>
                                        <a href="{{ route('add-category') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/icons8-cash-register-68.png') }}"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">Payment Methods</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".payment-method-modal">Add
                                        </button>
                                        <a href="{{ route('add-category') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/icons8-user-64-2.png') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">User Registration</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".user-registration-modal">Add
                                        </button>
                                        <a href="{{ route('add-admin') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2 col-md-2 col-lg-2 mb-4 p-3">
                                <div class="card">
                                    <img src="{{ asset('assets/images/orders.png') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-text text-center mt-2">Orders Details List</h5>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success btn-sm btn-rounded waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target=".product-category-modal">Add
                                        </button>
                                        <a href="{{ route('add-category') }}"
                                            class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">
                                            View List</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--2nd row -->


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--ASSETS-->
    @include('admin-panel.settings.products.product_modal')
    @include('admin-panel.settings.categories.category_modal')
    @include('admin-panel.settings.categories.subcategory_modal')
    @include('admin-panel.settings.payments.payment_method_modal')
    @include('admin-panel.settings.users.user_registration_modal')
   
    
    

@endsection
