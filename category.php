<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php if (have_posts()): ?>

    <article class="article">
        <h1 class="cat-title">

            <?php single_cat_title(' '); ?>

        </h1>

    </article>

    <main id="main" role="main">

        <?php while (have_posts()) : the_post();

            get_template_part('partials/content');

        endwhile; ?>

        <div class="pagination">

            <?php pagination(); ?>

        </div>

    </main>

<?php else:

    get_template_part('partials/content', 'none');

endif; ?>

<?php get_footer(); ?>