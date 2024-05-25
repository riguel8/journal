<div class="space-sm bg-light-subtle" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 style="text-align: center;">ANNOUNCEMENTS</h3>
                        <br>
                        <ul style="text-align:justify;">
                            <li>Ut consequat, quam a lobortis elementum, mauris felis ultricies ante, sit amet dapibus quam tortor sit amet mi.</li>
                            <br>
                            <li>Pellentesque vel venenatis nisi. Ut scelerisque tortor ut maximus aliquam.</li>
                            <br>
                            <li>Ut consequat, quam a lobortis elementum, mauris felis ultricies ante, sit amet dapibus quam tortor sit amet mi.</li>
                            <br>
                            <li>Pellentesque vel venenatis nisi. Ut scelerisque tortor ut maximus aliquam.</li>
                        </ul>
                        <br>
                        <h3 style="text-align: center;">VOLUMES</h3>
                        <br>
                        <ul style="text-align: center;">
                            <?php foreach ($volumes as $volume): ?>
                                <li><a href=""><?php echo $volume['vol_name']; ?></a></li>
                                <br>
                            <?php endforeach; ?>
                        </ul>
                        <br>
                        <h3 style="text-align: center;">NEWS</h3>
                        <br>
                        <ul style="text-align:justify;">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce placerat, eros a sodales gravida, sem dui rutrum enim, vel vestibulum nunc nisl sed arcu. Proin a rutrum elit, id eleifend mauris. Nam ut urna pharetra eros congue aliquam. Quisque blandit augue eu quam rutrum, sed imperdiet augue euismod. Fusce eu augue eget lectus placerat aliquam vitae at dui. Sed nulla diam, imperdiet eu odio sit amet, auctor mollis massa.</p>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h3 class="section-title mb-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                    Available Articles
                </h3>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-lg-20 col-md-20">
                                        <?php foreach ($articles as $article): ?>
                                            <div class="card mb-2">
                                                <div class="card-body">
                                                    <h5 class="mb-0">Article</h5>
                                                    <p><strong>Keywords: </strong> <?php echo $article['keywords']; ?></p>
                                                </div>
                                                <div class="card-body p-10">
                                                    <h5 class="card-title fs-5"><?php echo $article['title']; ?></h5>
                                                    <p class="card-text">
                                                        Authors: 
                                                        <?php 
                                                        $author_names = array_map(function($author) {
                                                            return $author['author_name'];
                                                        }, $article['authors']);
                                                        echo implode(', ', $author_names);
                                                        ?>
                                                    </p>
                                                    <p class="card-text">
                                                        DOI: <a href=""><?php echo $article['doi']; ?></a>
                                                    </p>
                                                    <p class="card-text text-justify" style="text-align: justify;">
                                                        <?php
                                                        $abstract = $article['abstract'];
                                                        $max_length = 200; // Max length for the abstract
                                                        if (strlen($abstract) > $max_length) {
                                                            $abstract = substr($abstract, 0, $max_length) . '...';
                                                        }
                                                        echo $abstract;
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="card-body button-group d-flex align-items-stretch p-10">
                                                    <div class="ms-auto">
                                                        <a href="<?php echo base_url('assets/articles/' . $article['filename']); ?>" target="_blank" class="btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row">
                                                            <iconify-icon icon="bi:file-earmark-pdf" width="24" height="24"></iconify-icon>
                                                            &nbsp; PDF
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
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

<style>
    .text-justify {
        text-align: justify;
    }
</style>
