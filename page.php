<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (have_posts()): ?>

    <article class="article">
        <h1 class="cat-title">

            <?php echo get_the_title(); ?>

        </h1>
    </article>

    <main id="main" role="main">
        <article class="article">

            <?php while (have_posts()) : the_post();

                the_content('');

                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                
            endwhile; ?>

        </article>
    </main>

<?php else:

    get_template_part('partials/content', 'none');

endif; ?>

<?php get_footer(); ?>