<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
 
	<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	
	<time datetime="<?php echo get_the_time('M j, Y') ?>" class="date-1"><?php echo get_the_time('M j, Y') ?></time>
	
	<div class="name-author">by <?php the_author_posts_link(); ?></div>
	<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.', 'comments', 'Comments off'); ?> 
	 
	<div class="clear"></div>            
	 <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php
                } else {
                    echo catch_that_image();
                }
                ?>                             
	  <?php the_excerpt(); ?>
	   <a href="<?php the_permalink() ?>" class="btn btn-1"><?php _e('Read More...', 'replican'); ?></a>          
</li>
<?php
    endwhile;
else:
    ?>
    <div>
        <p>
            <?php _e('Sorry no post matched your criteria', 'replican'); ?>
        </p>
    </div>
<?php endif; ?>
<!--End Loop-->