<div id="content" class="site-content container py-5 mt-5">
    <div id="primary" class="content-area">

        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <main id="main" class="site-main">
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : ?>
                <header class="entry-header">
                    <?php the_post(); ?>
                    <!-- Title -->
                    <?php if(!get_header_image()) : ?>
                    <?php the_title('<h1>', '</h1>'); ?>
                    <?php endif ;?>
                    <!-- Featured Image-->
                    <?php bootscore_post_thumbnail(); ?>
                    <!-- .entry-header -->
                </header>
                <div class="entry-content">
                    <!-- Content -->
                    <?php 
                        
                            get_template_part('template-parts/top-bs_recipe');

                    ?>

                    <div class="the-content">
                        <div class="the-content-paragraph">
                            <?php the_content(); ?>
                        </div>
                    </div>
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