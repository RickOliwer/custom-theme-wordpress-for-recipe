<?php
	/*
	 * Template Post Type: post
	 */
	  
	 get_header();  ?>

<div id="content" class="site-content py-5 mt-4">
    <div id="primary" class="content-area m-auto w-100">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>


                <main id="main" class="site-main main-content">

                    <header class="entry-header">
                        <?php the_post(); ?>
                        <?php bootscore_category_badge(); ?>

                    </header>

                    <?php 
                        get_template_part('template-parts/content-single-bs_recipe');
                    ?>

                    <footer class="entry-footer clear-both">
                        <div class="mb-4">
                            <?php bootscore_tags(); ?>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <?php previous_post_link('%link'); ?>
                                </li>
                                <li class="page-item">
                                    <?php next_post_link('%link'); ?>
                                </li>
                            </ul>
                        </nav>
                    </footer>

                    <?php comments_template(); ?>

                </main> <!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>
