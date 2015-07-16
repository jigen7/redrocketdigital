<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 */
 ?>
<?php get_header(); ?>
<?php  replican_blog_background () ?>      
  <!--============================== content =================================-->      
   <div id="content"><div class="ic"></div>
    <div class="container">
          <div class="row">
        <article class="span8">
         <div class="inner-1">         
          <ul class="list-blog">
            <!-- ----------------Post loop starts --------------------- -->

                <?php get_template_part('content', 'index'); ?> 

                <!-- ------------------Post loop ends----------------------- --> 
                                 
          </ul>
          </div>  
		  <div class="clearfix"></div>
                    <nav id="nav-single"> <span class="nav-previous">
                            <?php next_posts_link(OLDER_POSTS); ?>
                        </span> <span class="nav-next">
<?php previous_posts_link(NEWER_POSTS); ?>
                        </span> </nav>
						<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
                    <div class="clearfix"></div>
        </article>
        <?php  get_sidebar(); ?>
      </div>
     </div>
  </div>
 </div>

<!--============================== footer =================================-->
<?php get_footer(); ?>