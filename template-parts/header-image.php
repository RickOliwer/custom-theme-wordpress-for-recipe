<?php if(get_header_image()) : ?>
    <?php 
        $title = get_the_title();

        if(is_home()){
            $title = get_bloginfo('name');
        }
    ?>
    <?php if(is_front_page()) : ?>
    <div id="hero-img">
        <img 
            src="<?php header_image(); ?>"
            width="<?= absint(get_custom_header()->width); ?>" 
            height="<?= absint(get_custom_header()->height); ?>" 
            alt="<?= esc_attr( get_bloginfo('name', 'display')); ?>"
        >
        <div class="hero-header-text">
            <h1>
                <?= $title; ?>
                
            </h1>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>