<?php
/*
  Template Name: Gallery
 */

get_header();
?>
<?php  replican_blog_background () ?>      
  <!--============================== content =================================-->      
      <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span12">
        <h3><?php the_title(); ?></h3>
         </article>
        <div class="clear"></div>
         <ul class="portfolio clearfix"> 
           <?php
                            if ($wp_query->have_posts()) : while (have_posts()) : the_post();
                                    the_content();
                                    ?>
                                <?php
                                endwhile;
                            endif;
                            ?>                      
            </ul> 
      </div>
        </div>
  </div>
    </div>

<!--============================== footer =================================-->
<?php get_footer(); ?>