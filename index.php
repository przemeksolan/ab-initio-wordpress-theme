<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (have_posts()): ?>

    <main id="main" role="main">

		<?php while (have_posts()) : the_post();

            get_template_part('partials/content');

		endwhile; ?>

        <?php pagination(); ?>

    </main>

<?php else:

    get_template_part('partials/content', 'none');

endif; ?>

<?php get_footer(); ?>