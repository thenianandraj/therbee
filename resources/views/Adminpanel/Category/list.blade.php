@include('Adminpanel.layouts.app')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <a href="javascript:history.back()">
                    <span class="menu-title">
                        <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Category List
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Category List</li>
                </ol>
            </nav>
        </div>
        <div class="form">
            @if(session('Success'))
                <div class="alert alert-success ">
                    {{ session('Success') }}
                </div>
            @endif
        </div>
        <div class="form">
            @if(session('Danger'))
                <div class="alert alert-danger ">
                    {{ session('Danger') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div style="text-align: right;">
                <h3 class="page-title">
                    <a class="nav-link" href="/category_create">
                        <span style="width: 150px; font-size: 16px;"
                            class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-plus-box mdi-icon"></i>&nbsp;Add Category
                        </span>
                    </a>
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Category</h4>
                        <!-- Add table-responsive class -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $i=>$category)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td><img src="{{ $category->image }}" width="100%" height="100%"></td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                <a href="/category_edit{{ $category->id }}" class="mdi mdi-lead-pencil" style="font-size: 24px;"></a>
                                                <a href="/category_delete{{ $category->id }}" class="mdi mdi-delete" style="font-size: 24px; color:red;"></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td class="table-paginate" colspan="3">{{ $categories->links() }}</td>
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
