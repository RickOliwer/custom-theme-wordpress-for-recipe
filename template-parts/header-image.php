<?php if(get_header_image()) : ?>
    <div id="site-header">
        <img 
            src="<?php header_image(); ?>"
            width="<?= absint(get_custom_header()->width); ?>" 
            height="<?= absint(get_custom_header()->height); ?>" 
            alt="<?= esc_attr( get_bloginfo('name', 'display')); ?>"
        >
    </div>

<?php endif; ?>