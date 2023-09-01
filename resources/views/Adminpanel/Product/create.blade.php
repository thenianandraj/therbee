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
            <form class="form-sample" action="/products_store" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label required">Product Name</label>
                    <div class="col-sm-9">
                      <input type="name" name="name" required class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label required">Product Code</label>
                    <div class="col-sm-9">
                      <input type="text" name="code" required class="form-control" />
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label required">HSN Code</label>
                    <div class="col-sm-9">
                      <input type="number" name="hsn" required class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label required">CGST</label>
                    <div class="col-sm-9">
                      <input type="number" name="cgst" required class="form-control" />
                    </div>
                  </div>

                </div>
              </div> --}}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label required">Product Image</label>
                    <div class="col-sm-9">
                      <input type="file" name="image" required class="form-control" accept=".png" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Save</button>
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


