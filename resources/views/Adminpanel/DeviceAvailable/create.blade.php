@include('Adminpanel.layouts.app')
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
                    <li class="breadcrumb-item"><a href="device_list">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Available Product</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Add Available Product</h4>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-sample" action="/devices_store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="title" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="select_category" class="col-sm-3 col-form-label required">Select
                                            Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" name="type"
                                                id="select_category">
                                                <option>Select</option>
                                                <option value="spares">Spares</option>
                                                <option value="devices">Add on Devices</option>
                                                <option value="laser">Laser Card</option>
                                                <option value="single">Single Head</option>
                                                <option value="multi">Multi Head</option>
                                                <option value="lcutting">Laser Cutting</option>
                                                <option value="paper">Paper Ctting</option>

                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" cols="40" rows="10" class="form-control"></textarea>
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
