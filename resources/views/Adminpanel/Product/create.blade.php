@include('Adminpanel.layouts.app')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <a href="javascript:history.back()">
                    <span class="menu-title">
                        <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Product
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="product_list">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Master</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Add products</h4>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-sample" action="/product_store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" name="product_name" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="select_category" class="col-sm-3 col-form-label required">Select Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="category" id="select_category">
                                                <option>Select</option>
                                                @foreach ($category as $item)
                                                    <option value="{{ $item->id }}" data-subcategories="{{ $item->subcategories }}">
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row" id="subcategory-container" style="display: none;">
                                        <label for="select_subcategory" class="col-sm-3 col-form-label">Select Subcategory</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="subcategory" id="select_subcategory">
                                                <option>Select</option>
                                                <!-- Subcategory options will be populated dynamically -->
                                            </select>
                                        </div>
                                    </div>
                                </div>                             
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Original Rate</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="original_rate" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Discount Rate</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="discount_rate" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Description</label>
                                        <div class="col-sm-9">
                                            <textarea  name="description" cols="40" rows="10"
                                                class="form-control" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Product Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" required class="form-control"
                                                accept=".png, .jpg, .jpeg" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Files</label>
                                        <div class="col-sm-9">
                                            <small class="form-text text-muted">1.DST- Bernina- 350 x 200 mm(14 x 08 inches)</small>
                                            <input type="file" class="form-control" name="files1" accept=".zip" id="files" multiple>
                                            <small class="form-text text-muted">2.DST- Brother- V3, V3SE- 350 x 200 mm(12 x 8 inches)</small>
                                            <input type="file" class="form-control" name="files2" accept=".zip" id="files" multiple>
                                            <small class="form-text text-muted">3.DST- Full normal</small>
                                            <input type="file" class="form-control" name="files3" accept=".zip" id="files" multiple>
                                            <small class="form-text text-muted">4.JEF- USHA-450e- 200 x 280mm</small>
                                            <input type="file" class="form-control" name="files4" accept=".zip" id="files" multiple>
                                            <small class="form-text text-muted">5.JEF- USHA-550e- 300 x 200mm</small>
                                            <input type="file" class="form-control" name="files5" accept=".zip" id="files" multiple>
                                            <small class="form-text text-muted">6.PES- Brother- BP3600- 360 x 240mm</small>
                                            <input type="file" class="form-control" name="files6" accept=".zip" id="files" multiple>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="form-check">
                                            <label class="form-check-label ">
                                                <input type="checkbox" class="form-check-input" value="1"
                                                    name="is_default" checked>Is Available For Home Page</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit"
                                    class="btn btn-block btn-lg btn-gradient-primary mt-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
</div>
<script>
    document.getElementById("select_category").addEventListener("change", function() {
       const selectedOption = this.options[this.selectedIndex];
       const subcategoriesData = selectedOption.getAttribute("data-subcategories");
   
       const subcategorySelect = document.getElementById("select_subcategory");
       const subcategoryContainer = document.getElementById("subcategory-container");
   
       // Clear previous options
       subcategorySelect.innerHTML = "<option>Select</option>";
   
       if (subcategoriesData) {
           // Parse the subcategories data
           const subcategories = JSON.parse(subcategoriesData);
   
           // Check if subcategories is valid (not null and not an empty array) ̰
           if (subcategories && Array.isArray(subcategories) && subcategories.length > 0 && subcategories[0] !== null) {
               // Show the subcategory container
               subcategoryContainer.style.display = "block";
   
               // Populate the subcategory dropdown
               subcategories.forEach(subcat => {
                   const option = document.createElement("option");
                   option.value = subcat;
                   option.textContent = subcat;
                   subcategorySelect.appendChild(option);
               });
           } else {
               // Hide subcategory container if no valid subcategories exist
               subcategoryContainer.style.display = "none";
           }
       } else {
           // Hide subcategory container if no subcategories data attribute exists
           subcategoryContainer.style.display = "none";
       }
   });
   </script>
@include('Adminpanel.layouts.footer')

