<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<!-- <title><?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?></title> -->
    <title>Red Rocket Digital</title>
	<meta charset="<?php bloginfo('charset'); ?>">
    <?php if (replican_get_option('replican_favicon') != '') { ?>
    <link rel="icon" href="<?php echo replican_get_option('replican_favicon'); ?>" type="image/x-icon">
    <?php } else { ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <?php } ?>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
   
	<script type="text/javascript">if($(window).width()>1024){document.write("<"+"script src='<?php echo get_template_directory_uri(); ?>/js/jquery.preloader.js'></"+"script>");}	</script>

	<script>		
		 jQuery(window).load(function() {	
		 $x = $(window).width();		
	if($x > 1024)
	{			
	jQuery("#content .row").preloader();    }

             jQuery('.magnifier-jigen').touchTouch();
     jQuery('.magnifier').touchTouch();
     jQuery('.spinner').animate({'opacity':0},1000,'easeOutCubic',function (){jQuery(this).css('display','none')});
  		  }); 
				
	</script>

	<!--[if lt IE 8]>
 
 	<![endif]-->
	<!--[if (gt IE 9)|!(IE)]><!-->
	<!--<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/docs.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
    <![endif]-->

    <!--Tabbed Menu CSS Jigen-->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css-tabbed/style-tabbed.css" type="text/css">


        <!--Tabbed Menu End-->

	</head>

	<body <?php body_class(); ?>>
	<div id="panel">
    <div class="navbar navbar-inverse navbar-fixed-top" id="advanced" style="margin-top: 0px; position: relative;">
        <span class="trigger">
            <strong></strong>
            <em></em>
        </span>
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
                <div class="top-nav-bar nav-collapse nav-collapse_  collapse">
                  <?php replican_top_nav() ?>
                </div>
            </div>
        </div>
    </div>
</div>
	
    <div class="spinner"></div> 
<!--============================== header =================================-->
<header>
<div class="container clearfix">
    <div class="row">
          <div class="container">
        <div class="navbar navbar_">
              
            <div class="span3">
			<?php if (replican_get_option('replican_logo') != '') { ?><h1 class="brand brand_">
                                <a href="<?php echo home_url(); ?>">
									<img src="<?php echo replican_get_option('replican_logo'); ?>" alt="<?php bloginfo('name'); ?>">
								</a></h1>
			<?php } else { ?>
            <h1 class="brand brand_"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
			<p><?php bloginfo('description'); ?></p><?php } ?>
			</div>
			
			<!-- menu -->
			<div class="span8">
            <a class="btn btn-navbar btn-navbar_" data-toggle="collapse" data-target=".nav-collapse_">Menu <span class="icon-bar"></span> </a>
            <div class="nav-collapse nav-collapse_  collapse">
                  <?php replican_nav(); ?>
            </div>
			</div>
      
      <!--- Start Edited Part -->
      <div>
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
        </div>
        <!--- End Edited Part -->



         
         </div>
      </div>
    </div>
  </div>
</header>