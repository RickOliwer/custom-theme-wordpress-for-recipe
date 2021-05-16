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
                        <p class="entry-meta">
                            <small class="text-muted">
                                <?php
							         bootscore_date();
							         _e(' by ', 'bootscore'); the_author_posts_link();
							         bootscore_comment_count();							
							     ?>
                            </small>
                        </p>
                    </header>

                    <div class="entry-content w-100">
                        <div class="recipe-content">
                            
                            <?php bootscore_recipe_gallery(); ?>
                            <div class="content-container">
                                <div class="paragraph-container">
                                    <?php the_title('<h1 class="title-text-h1">', '</h1>'); ?>
                                    <?php bootscore_recipe_cookingTime(); ?>
                                    <?php bootscore_recipe_rating(); ?>
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    
                        <div class="recipe-info">
                            <div class="ingredient-container">
                                <?php bootscore_recipe_ingredient(); ?>
                            </div>
                            <div class="instructions-container">
                                <?php bootscore_recipe_instructions(); ?>
                            </div>
                        </div>
                    </div>

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
