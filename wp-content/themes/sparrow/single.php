<?php get_header(); ?>

<!-- Page Title
================================================== -->
<div id="page-title">

    <div class="row">

        <div class="ten columns centered text-center">
            <h1>Single<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
                enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
        </div>

    </div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<?php
//    if (have_posts()){
//        while (have_posts()){
//            the_post();
//?>
<div class="content-outer">

    <div id="page-content" class="row">

<!--        --><?php //if (have_posts()){ while (have_posts()){ the_post(); ?>
            <div id="primary" class="eight columns">

                <?php get_template_part('post-template/post', get_post_format()); ?>

            </div> <!-- Primary End-->
<!--        --><?php //} } ?>

        <div id="secondary" class="four columns end">

            <aside id="sidebar">

                <div class="widget widget_search">
                    <h5>Search</h5>
                    <form action="#">

                        <input class="text-search" type="text" onfocus="if (this.value == 'Search here...') { this.value = ''; }" onblur="if(this.value == '') { this.value = 'Search here...'; }" value="Search here...">
                        <input type="submit" class="submit-search" value="">

                    </form>
                </div>

                <div class="widget widget_text">
                    <h5 class="widget-title">Text Widget</h5>
                    <div class="textwidget">Proin gravida nibh vel velit auctor aliquet.
                        Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                        nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                        a sit amet mauris. Morbi accumsan ipsum velit. </div>
                </div>

                <div class="widget widget_categories">
                    <h5 class="widget-title">Categories</h5>
                    <ul class="link-list cf">
                        <li><a href="#">Designs</a></li>
                        <li><a href="#">Internet</a></li>
                        <li><a href="#">Typography</a></li>
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Other Stuff</a></li>
                    </ul>
                </div>

                <div class="widget widget_tag_cloud">
                    <h5 class="widget-title">Tags</h5>
                    <div class="tagcloud cf">
                        <a href="#">drupal</a>
                        <a href="#">joomla</a>
                        <a href="#">ghost</a>
                        <a href="#">wordpress</a>
                    </div>
                </div>

                <div class="widget widget_photostream">
                    <h5>Photostream</h5>
                    <ul class="photostream cf">
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                        <li><a href="#"><img src="images/thumb.jpg" alt="thumbnail"></a></li>
                    </ul>
                </div>

            </aside>

        </div> <!-- Secondary End-->

    </div>

</div> <!-- Content End-->


<!-- Tweets Section
================================================== -->
<section id="tweets">

    <div class="row">

        <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
        </div>

        <ul id="twitter" class="align-center">
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
                <b><a href="#">2 Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
        </ul>

        <p class="align-center"><a href="#" class="button">Follow us</a></p>

    </div>

</section> <!-- Tweets Section End-->
<?php
//    }
//}
//?>

<?php get_footer(); ?>