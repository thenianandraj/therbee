@include('Adminpanel.layouts.app')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <a href="javascript:history.back()">
                    <span class="menu-title">
                        <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Category
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/category_list">Category</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category Master</li>
                </ol>
            </nav>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Category</h4>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-sample" action="/category_update/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Category Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" required class="form-control" placeholder="Enter Category Name" value="{{ old('name', $category->name) }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Subcategories</label>
                                        <div class="col-sm-9">
                                            <div id="subcategory-container">
                                                @if (isset($subcategories) && is_array($subcategories))
                                                    @foreach ($subcategories as $subcategory)
                                                        <div class="subcategory-group mb-2">
                                                            <input type="text" name="subcategories[]" class="form-control" placeholder="Enter Subcategory Name" value="{{ $subcategory }}" />
                                                            <button type="button" class="btn btn-danger remove-subcategory" style="margin-top: 5px;">Remove</button>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="subcategory-group mb-2">
                                                        <input type="text" name="subcategories[]" class="form-control" placeholder="Enter Subcategory Name" />
                                                        <button type="button" class="btn btn-danger remove-subcategory" style="margin-top: 5px;">Remove</button>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            
                                            <button type="button" class="btn btn-primary" id="add-subcategory">Add Subcategory</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Category Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" accept=".png, .jpg, .jpeg" />
                                            <small>Current Image: {{ $category->image }}</small> <!-- Display current image path -->
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="description">{{ old('description', $category->description) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Update</button>
                            </div>
                        </form>
                        
                        <script>
                            document.getElementById('add-subcategory').addEventListener('click', function() {
                                var container = document.getElementById('subcategory-container');
                                var newSubcategoryGroup = document.createElement('div');
                                newSubcategoryGroup.className = 'subcategory-group mb-2';
                                newSubcategoryGroup.innerHTML = `
                                    <input type="text" name="subcategories[]" class="form-control" placeholder="Enter Subcategory Name" />
                                    <button type="button" class="btn btn-danger remove-subcategory" style="margin-top: 5px;">Remove</button>
                                `;
                                container.appendChild(newSubcategoryGroup);
                            });
                        
                            document.getElementById('subcategory-container').addEventListener('click', function(e) {
                                if (e.target && e.target.classList.contains('remove-subcategory')) {
                                    e.target.parentElement.remove();
                                }
                            });
                        </script>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
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