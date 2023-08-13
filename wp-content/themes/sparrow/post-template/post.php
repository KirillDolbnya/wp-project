<article class="post">

    <div class="entry-header cf">

        <h1><a href="single.html" title=""><?php the_title(); ?></a></h1>

        <p class="post-meta">

            <time class="date" datetime="2014-01-14T11:24"><?php the_time('j F Y'); ?></time>
            /
            <span class="categories">
                <?php the_category(); ?>
            </span>

        </p>

    </div>

    <div class="post-thumb">
        <a href="single.html" title=""><?php the_post_thumbnail('post_thumb'); ?></a>
    </div>

    <div class="post-content">

        <p><?php the_post(); the_content(); ?></p>

    </div>

</article> <!-- post end -->
