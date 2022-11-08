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

    /* .row>div[class*='col-'] {
        display: flex;
    } */

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

            <div class="card">
                <div class="card-header text-center bg-dark text-white">
                    <div class="d-flex align-items-center">
                        <a href="{{route('settings')}}" class="text-success btn-lg"><i class="fa fa-cog">Settings</i></a>
                        <h3 class="mx-auto w-100 text-white mt-2">Welcome to Settings Page</h3>
                        {{-- <i class="fa fa-question-circle ml-auto"></i> --}}
                        <a href="{{route('home')}}" class="text-success btn-lg"><i class="fa fa-home">Dashboard</i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/products.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Register Product</p>
                                   
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
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/product_category.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Product Category</p>
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
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/icons8-sorting-64.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Subcategories</p>
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

                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/icons8-cash-register-68.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Payment Methods</p>
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
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/icons8-user-64-2.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">User Registration</p>
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
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/orders.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Orders Details List</p>
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
                    <div class="row">
                        <div class="col-4 col-md-4 col-lg-2">
                            <div class="card">
                                <img src="{{ asset('assets/images/icons8-user-64.png') }}" alt="Card image cap" width="100%">
                                <div class="card-body">
                                    <p class="card-text text-center font-weight-bold">Admin Registration</p>
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
