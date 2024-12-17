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
                        <h4 class="card-title">Update products</h4>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-sample" action="/product_update/{{$products->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{$products->id}}" name="id">
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="name" name="product_name"
                                                value="{{ $products->product_name }}" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="select_category" class="col-sm-3 col-form-label required">Select Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="category" id="select_category">
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}" data-subcategories="{{ $item->subcategories }}"
                                                    {{ $products->category == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row" id="subcategory-container" style="display: {{ $products->subcategory ? 'block' : 'none' }};">
                                        <label for="select_subcategory" class="col-sm-3 col-form-label">Select Subcategory</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="subcategory" id="select_subcategory">
                                                <option>{{ $products->subcategory}}</option>
                                                <!-- Subcategory options will be populated dynamically -->
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                                {{-- <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="select_category" class="col-sm-3 col-form-label required">Select
                                            Category</label>
                                        <div class="col-sm-9">
                                            @foreach($category as $item)
                                                <select class="form-control form-control-sm" name="category"
                                                    id="select_category">
                                                    <option value="{{ $products->category }}">
                                                        {{ $products->category }}</option>
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                </select>
                                            @endforeach
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Original Rate</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="original_rate"
                                                value="{{ $products->original_rate }}" required
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Discount Rate</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="discount_rate"
                                                value="{{ $products->discount_rate }}" required
                                                class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" value="{{ $products->keywords }}"
                                                required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Description</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" name="description" required
                                                class="form-control form-control-sm">{{ $products->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Product Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" value="{{$products->image}}" name="image" class="form-control"
                                                accept=".png, .jpg, .jpeg" />
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <div class="form-group row">
                                        <label>Current Image</label>
                                        <img src="{{ asset($products->image) }}" alt="Current Image" width="20%"
                                            height="50px">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label required">Files</label>
                                    <div class="col-sm-9">
                                        <small class="form-text text-muted">1.DST- Bernina- 350 x 200 mm(14 x 08 inches)</small>
                                        @if($products->files1)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files1" accept=".zip" id="files" multiple> 
                                        <small class="form-text text-muted">2.DST- Brother- V3, V3SE- 350 x 200 mm(12 x 8 inches)</small>
                                        @if($products->files2)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files2" accept=".zip" id="files" multiple>
                                        <small class="form-text text-muted">3.DST- Full normal</small>
                                        @if($products->files3)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files3" accept=".zip" id="files" multiple>
                                          <small class="form-text text-muted">4.JEF- USHA-450e- 200 x 280mm</small>
                                        @if($products->files4)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files4" accept=".zip" id="files" multiple>
                                        <small class="form-text text-muted">5.JEF- USHA-550e- 300 x 200mm</small>
                                        @if($products->files5)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files5" accept=".zip" id="files" multiple>
                                        <small class="form-text text-muted">6.PES- Brother- BP3600- 360 x 240mm</small>
                                        @if($products->files6)
                                        <span class="text-success">Uploaded</span>
                                    @endif
                                        <input type="file" class="form-control" name="files6" accept=".zip" id="files" multiple>
                                       
                                    </div>
                                </div> ̰
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
@include('Adminpanel.layouts.footer')

<style>
    .required:after {
        content: " *";
        color: red;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
<script>
    document.getElementById("select_category").addEventListener("change", function() {
        const selectedOption = this.options[this.selectedIndex];
        const subcategoriesData = selectedOption.getAttribute("data-subcategories");
    
        const subcategorySelect = document.getElementById("select_subcategory");
        const subcategoryContainer = document.getElementById("subcategory-container");
    
        subcategorySelect.innerHTML = "<option>Select</option>";
    
        if (subcategoriesData) {
            const subcategories = JSON.parse(subcategoriesData);
    
            if (subcategories && Array.isArray(subcategories) && subcategories.length > 0 && subcategories[0] !== null) {
                subcategoryContainer.style.display = "block";
    
                subcategories.forEach(subcat => {
                    const option = document.createElement("option");
                    option.value = subcat;
                    option.textContent = subcat;
                    subcategorySelect.appendChild(option);
                });
            } else {
                subcategoryContainer.style.display = "none";
            }
        } else {
            subcategoryContainer.style.display = "none";
        }
    });

    // Prepopulate subcategories if a subcategory is set
    document.addEventListener("DOMContentLoaded", function() {
        const categorySelect = document.getElementById("select_category");
        const selectedCategory = categorySelect.options[categorySelect.selectedIndex];
        const subcategoriesData = selectedCategory.getAttribute("data-subcategories");

        if (subcategoriesData) {
            const subcategories = JSON.parse(subcategoriesData);
            const subcategorySelect = document.getElementById("select_subcategory");

            if (subcategories && Array.isArray(subcategories) && subcategories.length > 0) {
                subcategories.forEach(subcat => {
                    const option = document.createElement("option");
                    option.value = subcat;
                    option.textContent = subcat;
                    option.selected = subcat === "{{ $products->subcategory }}";
                    subcategorySelect.appendChild(option);
                });
                document.getElementById("subcategory-container").style.display = "block";
            }
        }
    });
   </script>
