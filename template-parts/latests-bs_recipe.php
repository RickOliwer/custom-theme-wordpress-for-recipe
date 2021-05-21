<?php 


$top_recipes = new WP_Query([
    'post_type' => 'bs_recipe',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',

    


]);

if(!$top_recipes->have_posts()){
    return;
}
?>
    
    <h5 style="padding-left: 5.95rem; font-size: 1rem; margin-bottom: .9rem;">
        <?php 
        _e(' iRecipe latest recipe ', 'bootscore'); 
        ?>
    
    </h5>
<div class="my-card-container">
    <div class="my-grid">


        <?php while($top_recipes->have_posts()) : $top_recipes->the_post();?>

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
                        <div class="my-card-rating">
                            <?php bootscore_recipe_rating(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile ; ?>
        
        <?php
        wp_reset_postdata();
        ?>

    </div>

</div>