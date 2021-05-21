<div id="content" class="site-content container py-5 mt-0">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <main id="main" class="site-main">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : ?>

                    <?php the_post(); ?>

                <div class="entry-content">
                    <!-- Content -->
                    <div class="recipe-content">
                        <div class="content-container" style="width: 90% !important;">
                            <div class="paragraph-container">
                                <?php bootscore_front_page_preamble(); ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        
                        get_template_part('template-parts/top-bs_recipe');

                    ?>
                    <div class="the-content" style="margin-top: 7.8rem;">
                        <div class="the-content-paragraph">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php 
                        
                        get_template_part('template-parts/latests-bs_recipe');

                    ?>
                    <!-- .entry-content -->
                    <?php wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bootscore' ),
                        'after'  => '</div>',
                        ) );
                        ?>
                </div>
                <footer class="entry-footer">

                        <?php 

                            
                        ?>

                </footer>
                <?php endwhile ; ?>

            <?php endif ; ?>
            <!-- Comments -->
            <?php comments_template(); ?>

        </main><!-- #main -->

    </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
?>