<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">
        
        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>  

        <div class="row">
            <div class="col">

                <main id="main" class="site-main">


                    <nav class="category-nav mb-5">
                        <?php bs_recipe_category_badge(); ?>
                    </nav>
                    <div class="my-card-container">
                        <div class="my-grid">
                            <!-- Grid Layout -->
                            <?php if (have_posts() ) : ?>
                                <?php while (have_posts() ) : the_post(); ?>
                                    <div class="my-grid-item">
                                        <div class="my-card">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail() )
                                                    echo get_the_post_thumbnail(null, 'medium', ['class' => 'my-card-img']);
                                                ?>
                                            </a>
                                            <div class="my-card-content">
                                                <?php if ( 'bs_recipe' === get_post_type() ) : ?>
                                                    <p class="entry-meta my-card-entry-meta">
                                                        <small class="text-muted">
                                                            <?php
                                                                bootscore_date();
                                                                _e(' by ', 'bootscore'); the_author_posts_link();
                                                                bootscore_comment_count();							
                                                            ?>
                                                        </small>
                                                    </p>
                                                <?php endif; ?>
                                                <h2 class="my-card-header">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <div class="my-card-text">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div>
                        <?php bootscore_pagination(); ?>
                    </div>

                </main><!-- #main -->

            </div><!-- col -->

            
        </div><!-- row -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
?>