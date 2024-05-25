<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Add Author</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="home">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">Add Author</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                        <form method="POST" action="<?php echo site_url('authors/add'); ?>" enctype="multipart/form-data" class="form-horizontal form-material">
                                <center class="mt-4">
                                    <!-- Add id attribute to the image -->
                                    <img src="<?php echo base_url("assets/images/users/noimages.jpg ");?>" id="profilePics" class="rounded-circle" width="260">
                                </center>
                                <br>
                                <div class="text-center">
                                    <!-- Add id attribute to the input -->
                                    <input id="profilePicInputs" class="center form-control" type="file" name="images" accept="image/*">
                                </div>
                        </div>
                    </div>
                </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active show" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="col-md-12">Author Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter author name" name="author_name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Author Title</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="E.g. Mr, Mrs, Miss, Dr" name="author_title" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Enter email" name="email" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="col-md-12">Contact Number</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter contact number" name="contact_num" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" id="flexCheckDefault" <?php echo set_checkbox('active', '1'); ?>>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Active
                                    </label>
                                </div>
                                <div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">
                                            Add Author
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
