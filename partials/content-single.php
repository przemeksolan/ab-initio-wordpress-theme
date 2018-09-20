<?php echo the_post_thumbnail( 'full' ); ?>

<article class="article" id="post-<?php the_ID() ?>" class="<?php post_class() ?>">
    <header class="post-header">
        <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        <div class="post-info"><?php echo get_the_date(); ?> in <?php the_category(' and '); ?></div>
    </header>
    <section class="post-excerpt">

        <?php the_content() ?>

        <div class="post-info"><?php the_tags('Tags: ', ', '); ?></div>

    </section>
</article>

<?php wcr_related_posts(); ?>

<hr>