@include('Adminpanel.layouts.app')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <a href="javascript:history.back()">
                <span class="menu-title">
                  <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Product List
              </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product List</li>
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
                <a class="nav-link" href="/product_create"> 
                  <span style="width: 150px; font-size: 16px;" class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-plus-box mdi-icon"></i>&nbsp;Add Products
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
                  <input type="text" id="product-search-input" class="form-control" placeholder="Search by Product Name or Code">
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
                  <h4 class="card-title">Products</h4>
                  </p>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>S No</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @foreach ($products as $product) --}}
                      <tr>
                        <td></td>
                        {{-- <td>{{ ++$i }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->code }}</td>
                        <td>
                          <img src="{{ asset('storage/' . $product->image) }}" width="100%" height="100%">
                        </td>
                        <td> --}}
                          {{-- <a href="/products_edit{{$product->id}}" class="mdi mdi-lead-pencil"></a>
                          <a href="/products_delete{{$product->id}}" class="mdi mdi-delete"></a>

                          <!-- <a class="mdi mdi-delete" data-href="/products_delete/{{$product->id}}"  data-toggle="modal" data-target="#confirm-delete"></a> -->
                        </td> --}}
                      </tr>
                      {{-- @endforeach --}}
                    </tbody>
                    {{-- <tr>
                      <td class="table-paginate" colspan="4">Showing{{$products->firstItem() }} {{ $products->lastItem() }} of {{ $products->total() }}</td>
                        <td class="table-paginate" colspan="3">{{ $products->links() }}</td>
                    </tr> --}}
                  </table>
                  
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