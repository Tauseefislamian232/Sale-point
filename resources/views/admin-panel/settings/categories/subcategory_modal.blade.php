<!-- Transaction Modal -->
<div class="modal fade product-subcategory-modal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="product-category-modal">Add New Product's SUB-Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               
                <form class="needs-validation"   id="form_product_subcategory" novalidate action="{{ url('store-subcategory') }}" method="POST">
                    @csrf
                   
                        <div class="col-md-12">
                            <div class="mb-3">
                                {{-- <label for="validationCustom01" class="form-label">Category Name:</label> --}}
                                <input type="text" name="name" class="form-control" id="validationCustom01"
                                    placeholder="subcategory name" required>
                                {{-- <input type="hidden" name="cat_id" id="cat_id" value="{{ $category_record->id }}"> --}}
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <button type="submit" form="form_product_subcategory" class="btn btn-primary "
                            id="product-category-form" value="Submit">Submit</button>
                        <button type="button" class="btn btn-secondary m-2" id="product-category-form"
                            data-bs-dismiss="modal">Close</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- end modal -->
