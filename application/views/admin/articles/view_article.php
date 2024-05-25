<div class="body-wrapper">
    <div class="container-fluid">
        <div class="font-weight-medium shadow-none position-relative overflow-hidden mb-4">
            <div class="d-sm-flex d-block justify-content-between align-items-center">
                <h5 class="mb-0 fw-semibold text-uppercase">Article Details</h5>
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('home'); ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-decoration-none" href="<?php echo site_url('articles'); ?>">Articles</a>
                        </li>
                        <li class="breadcrumb-item text-primary" aria-current="page">
                            Article Details
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-10">
                        <h5 class="card-title"><?php echo $article['title']; ?></h5>
                        <!-- Keywords -->
                        <p><strong>Keywords: </strong> <?php echo $article['keywords']; ?></p>
                    </div>
                    <div class="card-body p-10" style="text-align: justify;">
                        <p><strong>Abstract </strong></p>
                        <p class="card-text" style="text-align: justify;">
                            <?php echo $article['abstract']; ?>
                        </p>
                        <p class="card-text">
                            Authors: <?php echo $article['author_names']; ?>
                        </p>
                        <p class="card-text">
                            Volume: <a href="#"><?php echo $article['vol_name']; ?></a>
                        </p>
                        <p class="card-text">
                            DOI: <a href="#"><?php echo $article['doi']; ?></a>
                        </p>
                    </div>

                    <div class="card-body button-group d-flex align-items-stretch p-10">
                        <div class="ms-auto">
                            <a href="<?= base_url('./assets/articles/' . $article['filename']); ?>" target="_blank" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row">
                                <iconify-icon icon="bi:file-earmark-pdf" width="24" height="24"></iconify-icon>
                                &nbsp; PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
