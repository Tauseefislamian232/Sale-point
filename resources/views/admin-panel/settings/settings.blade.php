@extends('admin-panel.master')
<style>
    /* Prevent image stretching as it's resized */
.card-img-top {
    object-fit: cover;
}

/* Make all cards in row the same height */
.row {
   display: flex;
   flex-wrap: wrap;
}

.row > div[class*='col-'] {
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
    height: 50vw;
  }
}

@media (min-width: 768px) { 
  .card-img-top {
    height: 30vw;
  }
}

@media (min-width: 992px) { 
  .card-img-top {
    height: 20vw;
  }
}

@media (min-width: 1200px) { 
  .card-img-top {
    height: 20vw;
  }
}


</style>
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- the cols in this div change the number of cards per row depending on screen size and the mb-4 adds space below cards if they spill over into the next row-->
                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                              <div class="card">
                                <img class="card-img-top" width="50%" src="https://res.cloudinary.com/sepuckett86/image/upload/v1513176680/IMG_5837_xicdt5.jpg" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Product Categories</p>
                                </div>
                                <div class="card-footer">
                                    <button  class="card-link" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light"
                                    data-bs-toggle="modal" data-bs-target=".product-category-modal">Card link</button>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                              <div class="card">
                                <img class="card-img-top" src="https://res.cloudinary.com/sepuckett86/image/upload/v1513176680/IMG_5837_xicdt5.jpg" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Product Categories</p>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                              <div class="card">
                                <img class="card-img-top" src="https://res.cloudinary.com/sepuckett86/image/upload/v1513176680/IMG_5837_xicdt5.jpg" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Product Categories</p>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                              </div>
                            </div>
                            <div class="col-6 col-md-4 col-lg-3 mb-4">
                              <div class="card">
                                <img class="card-img-top" src="https://res.cloudinary.com/sepuckett86/image/upload/v1513176680/IMG_5837_xicdt5.jpg" alt="Card image cap">
                                <div class="card-body">
                                  <p class="card-text">Product Categories</p>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                              </div>
                            </div>
                           
                           
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--ASSETS-->
      <!-- Transaction Modal -->
      <div class="modal fade product-category-modal" tabindex="-1" role="dialog"
      aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="product-category-modal">Register New Product's Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  {{-- <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                  <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p> --}}

                  <div class="table-responsive">

                      <table class="table align-middle table-nowrap">
                          <thead>

                          </thead>
                          <tbody>
                              <form id="form_product_category" novalidate method="POST" action="{{ route('store-category') }}"
                                  enctype="multipart/form-data">
                                  @csrf
                                  <div class="mb-3">
                                      <label for="username" class="form-label">Enter New Product's Category</label>
                                      <input type="text" id="product-category-name" placeholder="Enter Product's Category Name" required
                                          class="form-control @error('name') is-invalid @enderror" name="product_category"
                                          value="{{ old('product_category') }}" required autocomplete="name" autofocus>

                                      @error('product_category')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  {{-- <div class="mb-3">
                                      <label for="useremail" class="form-label">Email</label>
                                      <input type="email" id="useremail" placeholder="Enter email"
                                          class="form-control @error('email') is-invalid @enderror" name="email"
                                          value="{{ old('email') }}" autocomplete="email" required>

                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <div class="mb-3">
                                      <label for="userpassword" class="form-label">{{ __('Password') }}</label>
                                      <div class="input-group auth-pass-inputgroup">
                                          <input type="password" id="userpassword"
                                              class="form-control @error('password') is-invalid @enderror" name="password"
                                              autocomplete="new-password" placeholder="Enter password"
                                              value="{{ old('password') }}" required>
                                          <button class="btn btn-light " type="button" id="password-addon"><i
                                                  class="mdi mdi-eye-outline"></i></button>

                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>

                                  <div class="mb-3">
                                      <label for="username" class="form-label">Phone Number</label>
                                      <input type="number" id="phone" placeholder="Enter Phone Number" required
                                          class="form-control @error('phone') is-invalid @enderror" name="phone"
                                          value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                      @error('phone')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="mb-3">
                                      <label for="username" class="form-label">User Type</label>
                                      <select name="is_admin" id="is_admin" class="form-control">
                                          <option value="NULL">---</option>
                                          <option value="food">Food</option>
                                          <option value="colddrink">Cold drinks</option>
                                          <option value="coffee">Coffees</option>
                                      </select>
                                      @error('is_admin')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <div class="mb-3">
                                      <label for="username" class="form-label">Avatar</label>
                                      <input type="file" id="avatar" placeholder="Enter username" required
                                          class="form-control @error('name') is-invalid @enderror" name="avatar"
                                          autocomplete="name" autofocus>

                                      @error('avatar')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div> --}}
                                  <button type="submit" form="form_product_category" class="btn btn-primary " id="modal_submit_product_category"
                                      value="Submit">Submit</button>
                                  <button type="button" class="btn btn-secondary m-2" id="modal_close_product_category"
                                      data-bs-dismiss="modal">Close</button>
                              </form>
                          </tbody>
                      </table>
                  </div>
              </div>

          </div>
      </div>
  </div>
  <!-- end modal -->
@endsection
