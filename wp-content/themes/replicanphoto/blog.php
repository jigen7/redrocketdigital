<?php 
/*
 * Template Name: Blog
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
		  <?php 
			$limit = get_option('posts_per_page');
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query->query('showposts=' . $limit . '&paged=' . $paged);
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
		  ?>
            <!-- ----------------Post loop starts --------------------- -->

                <?php get_template_part('content', 'blog'); ?> 

                <!-- ------------------Post loop ends----------------------- --> 
                                 
          </ul>
          </div>  
        </article>
        <?php  get_sidebar(); ?>
      </div>
     </div>
  </div>
 </div>

<!--============================== footer =================================-->
<?php get_footer(); ?>