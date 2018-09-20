<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'full' ); ?></a>

<article class="article" id="post-<?php the_ID() ?>" class="<?php post_class() ?>">

    <h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    <div class="post-info"><?php echo get_the_date(); ?> in <?php the_category(' and '); ?></div>

    <section class="post-excerpt">

        <?php the_excerpt(); ?>

    </section>

</article>

<hr>