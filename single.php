<?php get_header(); ?>
<?php get_sidebar(); ?>

    <main>

        <?php

        if (have_posts()):

            while (have_posts()) : the_post();

                get_template_part('partials/content', 'single');

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;

        endif;

        ?>

    </main>

<?php get_footer(); ?>