<?php
/**
 * The Template for displaying all single posts
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
            <!-- ************* Post loop starts ************* -->

              <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			   <!-- Start the Loop. -->
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
            <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			
            <time datetime="<?php echo get_the_time('M j, Y') ?>" class="date-1"><?php echo get_the_time('M j, Y') ?></time>
            <div class="name-author">by <?php the_author_posts_link(); ?></div>
           <?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.', 'comments', 'Comments off'); ?>
            <div class="clear"></div>            
                                            
              <?php the_content(); ?>
                      
            </li> 
				<?php endwhile;
					  else:
				?>
                    <div>
                        <p>
                            <?php echo SORRY_NO_POST_MATCHED_YOUR_CRETERIA; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <!-- ------------------Post loop ends----------------------- --> 
                  <!-- ------------------Comment starts ----------------------- -->
                <?php comments_template(); ?>
                <!-- ------------------Comment Ends----------------------- -->               
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