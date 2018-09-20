<?php if (!empty($related_posts)) { ?>

    <article class="article">
        <h5><?php _e('Related articles', 'ab-initio'); ?></h5>

        <section class="post-excerpt">
            <ul>

                <?php
                    foreach ($related_posts as $post) {
                        setup_postdata($post);
                ?>

                <li>
                    <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

                        <?php the_title(); ?>

                    </a>
                </li>

                <?php } ?>

            </ul>
        </section>
    </article>

<?php } ?>