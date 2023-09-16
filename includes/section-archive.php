<div class="container">
    <h1 class="text-uppercase mt-3"><?php single_cat_title() ?></h1>
    <div class="row">
        <div class="col-sm-9">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
            ?>
                    <div class="border rounded my-3 p-3">
                        <div class="d-flex">
                            <div class="p-3 w-25">
                                <div class="archive-page-thumbnails">
                                    <?php the_post_thumbnail('blog-thumbnail', ['class' => 'img-fluid rounded', 'style' => 'max-width: 100%; height: 200px; object-fit: cover']); ?>
                                </div>
                            </div>
                            <div class="p-3 w-75">
                                <h3><?php the_title(); ?></h3>
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-success">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="col-sm-3 mt-3">
            <div class="bg-light p-3 rounded">
                <h4 class="text-uppercase">All Categories</h4>
                <ul class="list-group text-capitalize">
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                    ?>
                        <li class="list-group-item">
                            <a class="text-decoration-none text-black" href="<?php echo get_category_link($category->term_id); ?>">
                                <?php echo $category->name; ?>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
