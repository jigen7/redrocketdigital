<?php get_header(); ?>
<?php  replican_blog_background() ?>
 <div class="container">
    <div class="row">
       <div class="span12">
        <!--============================== slider =================================-->
            <div class="flexslider">
                <ul class="slides">

                    <?php if (replican_get_option('replican_slideimage1') != '') { ?>
                    <li> <img src="<?php echo replican_get_option('replican_slideimage1'); ?>" alt="" ></li>
                    <?php } else { ?>
                    <li> <img src="<?php echo get_template_directory_uri(); ?>/img/devushka-vzglyad-portret-cvety.jpg" alt="" > </li>
                    <?php } ?>

                    <?php if (replican_get_option('replican_slideimage2') != '') { ?>
                    <li> <img src="<?php echo replican_get_option('replican_slideimage2'); ?>" alt="" > </li>
                    <?php } else {} ?>

                    <?php if (replican_get_option('replican_slideimage3') != '') { ?>
                    <li><img src="<?php echo replican_get_option('replican_slideimage3'); ?>" alt="" > </li>
                    <?php } else {} ?>

                    <?php if (replican_get_option('replican_slideimage4') != '') { ?>
                    <li><img src="<?php echo replican_get_option('replican_slideimage4'); ?>" alt="" ></li>
                    <?php } else {} ?>

                    <?php if (replican_get_option('replican_add_more_slider') != '') { ?>
                    <?php echo do_shortcode(replican_get_option('replican_add_more_slider')); ?>
                    <?php } else {} ?>

              </ul>
            </div><!--end of flexslider-->
        <span id="responsiveFlag"></span>
            <div class="block-slogan">
                <?php if (replican_get_option('replican_welcome_heading') != '') { ?>
                      <h2><?php echo replican_get_option('replican_welcome_heading'); ?></h2>
                      <?php } else { ?>
                      <h2>Welcome!</h2>
                      <?php } ?>

                 <div id="divextra">
                      <?php if (replican_get_option('replican_welcome_text') != '') { ?>
                    <p><?php echo replican_get_option('replican_welcome_text'); ?></p>
                     <?php } else { ?>
                    <p><?php _e('Air Show Photography can be some of the most rewarding and challenging genres that any amateur photographer can undertake. The excitement of jets screaming past at 300 knots, the drone of an Allison engine, and the near hysteria of the crowds can all make for a great day of photography.', 'replican'); ?></p>
                    <?php } ?>

                    <!-- Form Template -->
                    <?php echo do_shortcode("[contact-form-7 id='31' title='Contact form 1']") ?>
                    <!-- Form Template End-->
                 </div><!--end of divextra-->

                <!--Before and After Section-->
                <H2>Services</H2>
                    <div class="tabs_holder">
                        <br>
                        <ul>
                            <li class="tab_selected"><a href="#your-tab-id-1">Basic Photoshop</a></li>
                            <li><a href="#your-tab-id-2">Digital Painting</a></li>
                        </ul>
                        <div class="content_holder">
                            <div id="your-tab-id-1">
                               <div class="txt-1"> ** Hover to Image to show After Effects </div>

                                <?php $url = home_url();?>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/1.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/1.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/1.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/1.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/2.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/2.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/2.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/2.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/3.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/3.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/3.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/3.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/4.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/4.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/4.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/4.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/5.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/5.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/5.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/5.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/8.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/8.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/8.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/8.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/9.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/9.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/9.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/9.after-th.jpg'">
                                </a>


                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/11.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/11.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/11.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/11.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/10.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/10.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/10.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/10.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/6.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/6.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/6.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/6.after-th.jpg'">
                                </a>

                                <a class="magnifier-jigen" href = "<?php echo $url; ?>/images/7.after.jpg">
                                    <img class="imgtabbed" src="<?php echo $url; ?>/images/7.after-th.jpg"
                                         onmouseover="this.src='<?php echo $url; ?>/images/7.before-th.jpg'"
                                         onmouseout="this.src='<?php echo $url; ?>/images/7.after-th.jpg'">
                                </a>


                            </div><!-- your-tab-id-1 -->
                            <div id="your-tab-id-2">
                                Some content tab 2
                            </div><!-- your-tab-id-2 -->
                        </div><!-- /.content_holder -->
                    </div><!-- /.tabs_holder -->




            </div><!--end of block-slogan-->

      </div><!--end of span12-->
    </div><!--end of row-->
</div><!--end of container-->
      
      <!--============================== content =================================-->
      
      <div id="content" class="content-extra"><div class="ic"></div>
      <?php if (replican_get_option('replican_blogbackgrnd') != '') { ?>
    <div class="row-1" style="background: <?php echo replican_get_option('replican_blogbackgrnd'); ?>;">
    <?php } else { ?>
    <div class="row-1" style="background: #000000;">
    <?php } ?>
          <div class="container">
        <div class="row">
              <ul class="thumbnails thumbnails-1">
			  <!-- Start the Loop. -->
			  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="span3">
                  <div class="thumbnail thumbnail-1">
                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <?php the_title(); ?>
                                </a></h3>
                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                            <?php replican_get_thumbnail(550,
                                    297); ?>
                        <?php } else { ?>
                            <?php replican_get_image(550,
                                    297); ?> 
                                <?php
                            }
                            ?>
                <section> <strong>By&nbsp;<?php the_author_posts_link(); ?><div class="clear"></div></strong>
                      <?php the_excerpt(); ?>
                      <a href="<?php the_permalink() ?>" class="btn btn-1">Read More</a> </section>
              </div>
                </li>
				<!--End Post-->
    <?php endwhile;
else:
    ?>
            <div class="post">
                <p>
    <?php _e('Sorry, no posts matched your criteria.', 'replican'); ?>
                </p>
            </div>
<?php endif; ?>
        <!--End Loop-->
            
          </ul>
            </div>
      </div>
        </div>
    <div class="container">
          <div class="row">
        <article class="span6">
		<?php if (replican_get_option('replican_about_title') != '') { ?>
              <h3><?php echo replican_get_option('replican_about_title'); ?></h3>
			  <?php } else { ?>
              <h3><?php _e('Shortly About Me', 'replican'); ?></h3>
			  <?php } ?>
              <div class="wrapper">
            <figure class="img-indent">
			<?php if (replican_get_option('replican_about_image') != '') { ?>
			<img src="<?php echo replican_get_option('replican_about_image'); ?>" alt="" />
			<?php } else { ?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/page1-img5.jpg " alt="" />
			<?php } ?>
			</figure>
            <div class="inner-1 overflow extra">
			<?php if (replican_get_option('replican_about_subtitle') != '') { ?>
                  <div class="txt-1"><?php echo replican_get_option('replican_about_subtitle'); ?></div>
				  <?php } else { ?>
				<div class="txt-1"><?php _e('I Know WordPress inside and out and have done just about anything you can imagine based on it.', 'replican'); ?></div>
			  <?php } ?>
			  <?php if (replican_get_option('replican_about_description') != '') { ?>
			  <?php echo replican_get_option('replican_about_title'); ?>
			  <?php } else { ?>
				<?php _e('WordPress is powerful and simple enough to manage everything from one location. It makes life infinitely easier and puts you in control of your own content.', 'replican'); ?>
			  <?php } ?>
                
                  <div class="border-horiz"></div>
                  <div class="overflow">
                <ul class="list list-pad">
				<?php if (replican_get_option('replican_about_list_pad1') != '') { ?>
                      <?php echo do_shortcode(replican_get_option('replican_about_list_pad1')); ?>
						<?php } else { ?>
							<li><a href="#">Campaigns</a></li>
							<li><a href="#">Portraits</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Fine Art</a></li>
						<?php } ?>
                    </ul>
                <ul class="list">
				<?php if (replican_get_option('replican_about_list_pad2') != '') { ?>
                      <?php echo do_shortcode(replican_get_option('replican_about_list_pad2')); ?>
						<?php } else { ?>
							<li><a href="#">Advertising</a></li>
							  <li><a href="#">Lifestyle</a></li>
							  <li><a href="#">Love story</a></li>
							  <li><a href="#">Landscapes</a></li>
						<?php } ?>
                    </ul>
              </div>
                </div>
          </div>
            </article>
        <article class="span6">
		<?php if (replican_get_option('replican_homepage_gallery_heading') != '') { ?>
              <h3><?php echo replican_get_option('replican_homepage_gallery_heading'); ?></h3>
			  <?php } else { ?>
              <h3>Latest photoshoots</h3>
			  <?php } ?>
              <ul class="list-photo">
<?php $loop = new WP_Query( array( 'post_type' => 'gallery_post', 'posts_per_page' => '100' ) ); 
							if($loop->have_posts()){
				?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); 
				?>
				<li>
				
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
      <a href="<?php echo catch_that_image() ?>" class="magnifier">
			<?php replican_get_thumbnail2(120, 87); ?>
      </a>
                <?php } else { ?>
               <?php catch_that_image(13000, 12000); ?>
                <?php replican_get_image2(120, 87); ?></a><?php } ?>
                 
			
			<?php endwhile; ?>
			</li>
<?php 			} else {?>
            <li class="last"><a href="<?php echo get_template_directory_uri(); ?>/img/image-blank.png" class="magnifier" ><img src="<?php echo get_template_directory_uri(); ?>/img/page1-img17.jpg " alt="" /></a></li>
			<?php } ?>
          </ul>
            </article>
      </div>
        </div>
  </div>
    </div>

<!--============================== footer =================================-->
<?php get_footer(); ?>