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
                                        <label for="select_category" class="col-sm-3 col-form-label required">Select
                                            Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="category"
                                                id="select_category">
                                                <option>Select</option>
                                                @foreach ($category as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
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
                                            <textarea type="text" name="description" required
                                                class="form-control form-control-sm"></textarea>
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

