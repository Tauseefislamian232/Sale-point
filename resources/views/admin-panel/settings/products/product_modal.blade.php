 <!-- Transaction Modal -->
 <div class="modal fade create-product-modal" tabindex="-1" role="dialog"
 aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="transaction-detailModalLabel">Register New Product</h5>
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
                         <form id="form1" novalidate method="POST" action="{{ route('store-product') }}"
                             enctype="multipart/form-data">
                             @csrf
                            
                                 <div class="col-md-12 mb-3">
                                     <label for="username" class="form-label">Product Title</label>
                                     <input type="text" id="username" placeholder="Enter Product title" required
                                         class="form-control @error('name') is-invalid @enderror" name="name"
                                         value="{{ old('name') }}" required autocomplete="name" autofocus>

                                     @error('name')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                            
                                 <div class="col-md-12 mb-3">
                                     <label for="category" class="form-label">Select Category <code>*</code></label>
                                     <select class="form-control" name="category" id="category">
                                         <option hidden>Choose Category</option>
                                         @foreach ($category as $item)
                                             <option value="{{ $item->id }}">{{ $item->name }}</option>
                                         @endforeach
                                     </select>
                                     @error('category')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                           
                                 <div class="col-md-12 mb-3">
                                     <label for="course" class="form-label">Choose Subcategory
                                         <code>*</code></label>
                                     <select class="form-control" name="course" id="course"></select>
                                     @error('course')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             
                                 <div class="col-md-12 mb-3">
                                     <label for="username" class="form-label">Price</label>
                                     <input type="number" id="price" placeholder="Enter Product's Price"
                                         required class="form-control @error('price') is-invalid @enderror"
                                         name="price" value="{{ old('price') }}" required autocomplete="name"
                                         autofocus>

                                     @error('price')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>

                                 <div class="col-md-12 mb-3">
                                     <label for="username" class="form-label">Quantity</label>
                                     <input type="number" id="quantity" placeholder="Enter quantity Number"
                                         required class="form-control @error('name') is-invalid @enderror"
                                         name="quantity" value="{{ old('quantity') }}" required
                                         autocomplete="name" autofocus>

                                     @error('quantity')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                            
                             
                                 <div class="col-md-12 mb-3">
                                     <label for="username" class="form-label">Choose Product type</label>
                                     <div class="control">
                                         <label class="radio m-lg-3">
                                             <input type="radio" name="is_drink" value="0" checked>
                                             Drink Kitchen
                                         </label>
                                         <label class="radio m-lg-3">
                                             <input type="radio" name="is_drink" value="1">
                                             Food Kitchen
                                         </label>
                                         <label class="radio m-lg-3" disabled>
                                             <input type="radio" name="is_drink" disabled>
                                             Kitchen3
                                         </label>
                                     </div>

                                     @error('is_drink')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                            
                                 <div class="col-md-12 mb-3">
                                     <label for="username" class="form-label">Product Image</label>
                                     <input type="file" id="image" placeholder="Enter username" required
                                         class="form-control @error('image') is-invalid @enderror" name="image"
                                         autocomplete="image" autofocus>

                                     @error('image')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             
                             <div class="form-group mt-2">
                                 <button type="submit" form="form1" class="btn btn-primary" id="modal_submit"
                                     value="Submit">Submit</button>
                                 <button type="button" class="btn btn-secondary" id="modal_close"
                                     data-bs-dismiss="modal">Close</button>

                             </div>
                         </form>
                     </tbody>
                 </table>
             </div>
         </div>

     </div>
 </div>
</div>
<!-- end modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
 integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
 $(document).ready(function() {
     $('#category').on('change', function() {
         var categoryID = $(this).val();
         //    alert(categoryID);
         if (categoryID) {
             $.ajax({
                 url: "{{ url('/getCourse') }}/" + categoryID,
                 type: "GET",
                 //    data : {"_token":"{{ csrf_token() }}"},
                 //    dataType: "json",

                 success: function(data) {
                     if (data) {
                         $('#course').empty();
                         $('#course').append('<option hidden>Choose Course</option>');
                         $.each(data, function(key, course) {
                             $('#course').append('<option value="' + course.id +
                                 '">' + course.name + '</option>');
                             // $('select[name="course"]').append('<option value="'+ key +'">' + course.name+ '</option>');
                         });
                     } else {
                         $('#course').empty();
                     }
                 }
             });
         } else {
             $('#course').empty();
         }
     });
 });
</script>