<article class="span4">
          <div class="sidebar">
		  <?php if (!dynamic_sidebar('primary-widget-area')) : ?>
        <h3>
           <?php _e('Categories', 'replican'); ?>
        </h3>
        <ul class="list extra extra1">
            <?php wp_list_categories('title_li'); ?>
        </ul class="list extra extra1">
        <h3>
            <?php _e('Archives', 'replican'); ?>
        </h3>
        <ul class="list extra extra1">
            <?php wp_get_archives('type=monthly'); ?>
        </ul> 		
    <?php endif; // end primary widget area ?>
    <?php
// A second sidebar for widgets, just because.
    if (is_active_sidebar('secondary-widget-area')) :
        ?>
        <?php dynamic_sidebar('secondary-widget-area'); ?>
    <?php endif; ?>
          
          </div>
		  
        </article>