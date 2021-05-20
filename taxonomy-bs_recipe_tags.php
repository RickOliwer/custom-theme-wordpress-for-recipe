<?php
	/**
	 * The template for displaying archive pages
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
            <div class="col">

                <main id="main" class="site-main">

                    <!-- Title & Description -->
                    <header class="page-header mb-5">
                        <h1 class=""><?php single_term_title('Tag: ', true); ?></h1>
                    </header>
                    
                    <div class="m-auto w-50 mb-5">
                        <?php 
                            get_template_part('template-parts/searchform');
                        ?>
                    </div>

                    <nav class="category-nav mb-5">
                        <?php bs_recipe_tags_badge(); ?>
                    </nav>

                    <div class="my-card-container">
                        <div class="my-grid">
                            <!-- Grid Layout -->
                            <?php if (have_posts() ) : ?>
                                <?php while (have_posts() ) : ?>
                                    <?php 

                                        the_post();
                                        get_template_part('template-parts/content-archive-bs_recipe'); 
                                    ?>
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
