@include('Adminpanel.layouts.app')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <a href="javascript:history.back()">
                    <span class="menu-title">
                        <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Specifications List
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Specifications List</li>
                </ol>
            </nav>
        </div>
        <div class="form">
            @if (session('Success'))
                <div class="alert alert-success ">
                    {{ session('Success') }}
                </div>
            @endif
        </div>
        <div class="form">
            @if (session('Danger'))
                <div class="alert alert-danger ">
                    {{ session('Danger') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div style="text-align: right;">
                <h3 class="page-title">
                    <a class="nav-link" href="specific_create">
                        <span style="width: 150px; font-size: 16px;"
                            class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-plus-box mdi-icon"></i>&nbsp;Add
                        </span>
                    </a>
                </h3>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="input-group">
                        <input type="text" id="product-search-input" class="form-control"
                            placeholder="Search by Product Name or Code">
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Specifications</h4>
                            <!-- Add table-responsive class -->
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contents as $key=>$product)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->type}}</td>
                                                <td>
                                                    <a href="/specific_edit{{$product->id}}" class="mdi mdi-lead-pencil"
                                                        style="font-size: 24px;"></a>
                                                    <a href="/specific_delete{{$product->id}}" class="mdi mdi-delete"
                                                        style="font-size: 24px; color:red;"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tr>
                                        <td class="table-paginate" colspan="3">{{ $contents->links() }}</td>
                                    </tr>
                                </table>
                            </div>
                            <!-- End table-responsive -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('Adminpanel.layouts.footer')
<style>
    .input-group {
        margin-top: 20px;
    }
</style>
