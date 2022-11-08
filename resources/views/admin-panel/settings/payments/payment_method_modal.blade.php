 <!-- Transaction Modal -->
 <div class="modal fade payment-method-modal" tabindex="-1" role="dialog"
 aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="product-category-modal">Add New Payment Method</h5>
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
                         <form id="form_payment_method" novalidate method="POST"
                             action="{{ route('store-payment-method') }}" enctype="multipart/form-data">
                             @csrf
                             <div class="mb-3">
                                 <label for="username" class="form-label">Enter New Payment Method</label>
                                 <input type="text" id="product-category-name"
                                     placeholder="Enter Product's Category Name" required
                                     class="form-control @error('name') is-invalid @enderror"
                                     name="product_category" value="{{ old('product_category') }}" required
                                     autocomplete="name" autofocus>

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
                             <button type="submit" form="form_payment_method" class="btn btn-primary "
                                 id="form_payment_method12" value="Submit">Submit</button>
                             <button type="button" class="btn btn-secondary m-2"
                                 id="form_payment_method13" data-bs-dismiss="modal">Close</button>
                         </form>
                     </tbody>
                 </table>
             </div>
         </div>

     </div>
 </div>
</div>
<!-- end modal -->