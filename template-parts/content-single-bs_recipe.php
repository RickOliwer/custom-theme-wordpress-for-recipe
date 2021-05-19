<div class="entry-content w-100">
    <!-- Recipe content -->
    <div class="recipe-content">
        
        <?php bootscore_recipe_gallery(); ?>
        <div class="content-container">
            <div class="paragraph-container">
                <p class="entry-meta">
                    <small class="text-muted">
                        <?php
                            bootscore_date();
                            _e(' by ', 'bootscore'); the_author_posts_link();
                            bootscore_comment_count();							
                        ?>
                    </small>
                </p>
                <?php the_title('<h1 class="title-text-h1">', '</h1>'); ?>
                <?php bootscore_recipe_preamble(); ?>
                <?php bootscore_recipe_cookingTime(); ?>
                <?php bootscore_recipe_rating(); ?>
            </div>
        </div>
    
    </div>
    <!-- Recipe content End -->

    <div class="the-content">
        <div class="the-content-paragraph">
            <?php the_content(); ?>
        </div>
    </div>

    <!-- Recipe info -->
    <div class="recipe-info">
        <div class="ingredient-container">
            <?php bootscore_recipe_servings(); ?>
            <?php bootscore_recipe_ingredient(); ?>
        </div>
        <div class="instructions-container">
            <?php bootscore_recipe_instructions(); ?>
        </div>
    </div>
    <!-- Recipe info end -->

</div>