<header class="header">
    <main>
        <div class="social-accounts">
            <div class="profile">
                <div class="social-icons">
                    <ul>

                        <?php if(get_option('twitter')): ?>
                            <li><a class="icon-tw" href="https://twitter.com/<?php echo get_option('twitter'); ?>">Twitter</a>
                        <?php endif ?>

                        <?php if(get_option('instagram')): ?>
                            <li><a class="icon-in" href="https://instagram.com/<?php echo get_option('instagram'); ?>">Instagram</a>
                        <?php endif ?>

                        <?php if(get_option('pinterest')): ?>
                            <li><a class="icon-pi" href="https://pinterest.com/<?php echo get_option('pinterest'); ?>">Pinterest</a>
                        <?php endif ?>

                        <?php if(get_option('facebook')): ?>
                            <li><a class="icon-fb" href="https://facebook.com/<?php echo get_option('facebook'); ?>">Facebook</a>
                        <?php endif ?>

                        <?php if(get_option('dribbble')): ?>
                            <li><a class="icon-dr" href="https://dribbble.com/<?php echo get_option('dribbble'); ?>">Dribbble</a>
                        <?php endif ?>

                    </ul>
                </div>
            </div>
        </div>
        <div class="header-logo">
            <a class="logo" href="<?php echo site_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
            <p class="sub-header"><?php echo get_bloginfo('description'); ?></p>
            <div class="divider"></div>
            <ul class="nav-menu">

                <?php
                $args = array(
                    'orderby' => 'name',
                    'parent' => 0
                );
                $categories = get_categories( $args );
                foreach ( $categories as $category ) {
                    echo '<li><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf(__("View all posts in %s"), $category->name) . '" ' . '>' . $category->name.'</a></li>';
                }
                ?>

            </ul>
        </div>

    </main>
</header>