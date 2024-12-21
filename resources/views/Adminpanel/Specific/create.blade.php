@include('Adminpanel.layouts.app')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <a href="javascript:history.back()">
                    <span class="menu-title">
                        <i class="mdi mdi-arrow-left-bold-circle"></i></a>
                </span>Specifications
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="specific">List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Specifications</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"> Add Specifications</h4>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form class="form-sample" action="/specific_store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row-container">
                                <div class="row form-row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Title</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="title[]" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="select_category" class="col-sm-3 col-form-label required">Select Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="type[]" id="select_category">
                                                    <option>Select</option>
                                                    <option value="single">Single Head</option>
                                                    <option value="multi">Multi Head</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea name="description[]" cols="40" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-row">Remove</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-block btn-lg btn-gradient-secondary mt-4" id="add-row">Add Row</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-lg btn-gradient-primary mt-4">Save</button>
                                </div>
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
    // Add Row Button
    document.getElementById('add-row').addEventListener('click', function () {
        const container = document.querySelector('.row-container');
        const row = document.querySelector('.form-row').cloneNode(true);

        // Clear the values in the cloned row
        row.querySelectorAll('input, textarea').forEach(input => input.value = '');
        row.querySelectorAll('select').forEach(select => select.selectedIndex = 0);

        // Append the cloned row
        container.appendChild(row);

        // Reattach the remove event for the new row
        attachRemoveEvent();
    });

    // Remove Row Button
    function attachRemoveEvent() {
        document.querySelectorAll('.remove-row').forEach(button => {
            button.removeEventListener('click', removeRow); // Avoid duplicate listeners
            button.addEventListener('click', removeRow);
        });
    }

    function removeRow(event) {
        const row = event.target.closest('.form-row');
        if (row) row.remove();
    }

    // Attach the event to initial row
    attachRemoveEvent();
</script>
@include('Adminpanel.layouts.footer')
