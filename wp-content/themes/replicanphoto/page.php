<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 */
get_header();
?>
<?php  replican_blog_background () ?>
  <!--============================== content =================================-->      
   <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span8">
         <div class="inner-1">         
          <ul class="list-blog">
            <!-- *************Post loop starts ************** -->
			   <!-- Start the Loop. -->
               <?php if (have_posts()) while (have_posts()) : the_post(); ?>
			   <li>
            <h3><?php the_title(); ?></h3>
            <div class="clear"></div>            
                                            
              <?php the_content(); ?>
                      
            </li> 
<?php endwhile; ?>
                   <!-- ************ Comment starts ********** -->
                <?php //comments_template(); ?>
                <!-- *********** Comment Ends**************- -->
                <!-- *********Post loop ends************ --> 
                                 
          </ul>
          </div>  
        </article>
        <?php  //get_sidebar(); ?>
      </div>
     </div>
  </div>
 </div>

<!--============================== footer =================================-->
<?php get_footer(); ?>