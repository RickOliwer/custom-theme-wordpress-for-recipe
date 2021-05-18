<nav id="nav-main" class="navbar navbar-expand-lg navbar-light bg-light fixed-top the-navbar">

    <div class="container">
        <!-- logo -->
        <a class="navbar-brand logo" href="/">
        <?php 
            ir_navbar_logo();
        ?>
        </a>
        <!-- end logo -->
        <!-- Top Nav Widget -->
        <div class="top-nav order-lg-3 flex-grow-1 flex-lg-grow-0 d-flex justify-content-end">
            <?php if ( is_active_sidebar( 'top-nav' )) : ?>
            <div>
                <?php dynamic_sidebar( 'top-nav' ); ?>
            </div>
            <?php endif; ?>
        </div>

                <!-- Wp Bootstrap Nav Walker -->
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary',
                        'depth'             => 2,
                        'container'         => 'div',
                        'container_class'   => 'ms-auto',
                        'container_id'      => 'bootscore-navbar',
                        'menu_class'        => 'nav navbar-nav justify-content-end nav-items',
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker(),
                    ) );
                ?>

                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>

    </div><!-- container -->

</nav>