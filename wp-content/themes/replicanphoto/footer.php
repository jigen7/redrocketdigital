<!--============================== footer =================================-->
<footer>
      <div class="container clearfix">
    <ul class="list-social pull-right">
	<?php if (replican_get_option('replican_facebook') != '') { ?>
          <li><a class="icon-1" href="<?php echo replican_get_option('replican_facebook'); ?>"></a></li>
		<?php } else {} ?>
		
	<?php if (replican_get_option('replican_linkedin') != '') { ?>
          <li><a class="icon-2" href="<?php echo replican_get_option('replican_linkedin'); ?>"></a></li>
		<?php } else {} ?>
		
	<?php if (replican_get_option('replican_twitter') != '') { ?>
          <li><a class="icon-3" href="<?php echo replican_get_option('replican_twitter'); ?>"></a></li>
		<?php } else {} ?>
		
	<?php if (replican_get_option('replican_google') != '') { ?>	
          <li><a class="icon-4" href="<?php echo replican_get_option('replican_google'); ?>"></a></li>
		<?php } else {} ?>
        </ul>
    <div class="privacy pull-left">
     <p>
         <a href="<? echo home_url();?>/terms-and-condition/" >Terms & Condition</a>
     </p>
	</div>
  </div>
    </footer>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($){

        //hide all inputs except the first one
        $('p.hide').not(':eq(0)').hide();

        //functionality for add-file link
        $('a.add_file').on('click', function(e){
            //show by click the first one from hidden inputs
            $('p.hide:not(:visible):first').show('slow');
            e.preventDefault();
        });

        //functionality for del-file link
        $('a.del_file').on('click', function(e){
            //var init
            var input_parent = $(this).parent();
            var input_wrap = input_parent.find('span');
            //reset field value
            input_wrap.html(input_wrap.html());
            //hide by click
            input_parent.hide('slow');
            e.preventDefault();
        });
    });
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/css-tabbed/skinable_tabs.min.js"></script>
<script type="text/javascript">
    $('.tabs_holder').skinableTabs({
        effect: 'basic_display',
        skin: 'skin7',
        position: 'top'
    });
</script>
<?php wp_footer(); ?>
</body>
</html>