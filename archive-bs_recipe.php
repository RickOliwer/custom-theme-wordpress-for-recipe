<?php
	/**
	 * The template for displaying archive pages for Recipes
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bootscore
	 */
	
	get_header();
	?>

<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">
        
        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>  

        <div class="row">
            <?php //get_sidebar(); ?>
            <div class="col">

                <main id="main" class="site-main">

                    <!-- Title & Description -->
                    <header class="page-header mb-5">
                        <h1 class=""><?php the_archive_title(); ?></h1>
                    </header>
                    
                    <div class="m-auto w-50 mb-5">
                        <?php require_once('searchform.php');?>

                    </div>

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
                                        <?php if (has_post_thumbnail() )
                                            echo '<a href="<?php the_permalink(); ?>">' . get_the_post_thumbnail(null, 'medium', ['class' => 'my-card-img']) . '</a>';
                                        ?>

                                        <div class="my-card-content">
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
