 <!-- Transaction Modal -->
 <div class="modal fade product-category-modal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="product-category-modal">Register New Product's Category</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="product-category-form" class="needs-validation" novalidate
                     action="{{ route('store-category') }}" method="POST">
                     @csrf

                     <div class="col-md-12">
                         <div class="mb-3">
                             <label for="">Enter New Product Category</label>
                             <input type="text" name="name" class="form-control" placeholder="category name"
                                 required>
                         </div>
                     </div>


                     <button type="submit" form="form_product_category" class="btn btn-primary "
                         id="product-category-form" value="Submit">Submit</button>
                     <button type="button" class="btn btn-secondary m-2" id="product-category-form"
                         data-bs-dismiss="modal">Close</button>
                 </form>

             </div>
         </div>
     </div>
 </div>

 <!-- end modal -->
