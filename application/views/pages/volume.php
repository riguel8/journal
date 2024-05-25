
<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body p-10">
                        <h5 class="card-title"><?php echo $article['title']; ?></h5>
                    </div>
                    <div class="card-body p-10" style="text-align: justify;">
                        <p class="card-text">
                            DOI: <a href="#"><?php echo $article['doi']; ?></a>
                        </p>
                        <p class="card-text">
                            Authors: <?php echo $article['author_names']; ?>
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