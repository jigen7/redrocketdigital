<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = 'Replican Theme';
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = replican_get_option('of_options');
        //Front page on/off
        $file_rename = array("on" => "On", "off" => "Off");
        $showhide_sections = array("Show" => "Show", "Hide" => "Hide");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        //Stylesheet Reader
        $alt_stylesheets = array("red" => "red", "black" => "black", "coffee" => "coffee", "green" => "green", "teal-green" => "teal-green", "blue" => "blue", "yellow" => "yellow", "orange" => "orange", "pink" => "pink", "purple" => "purple");
        $lan_stylesheets = array("Default" => "Default");
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }

        // Populate OptionsFramework option in array for use in theme
        $contact_option = array("on" => "On", "off" => "Off");
        $captcha_option = array("on" => "On", "off" => "Off");
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_template_directory_uri() . '/images/';

        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");

        $options[] = array("name" => "Custom Logo",
            "desc" => "Upload a logo for your Website. The recommended size for the logo is 250px width X 50px height.",
            "id" => "replican_logo",
            "type" => "upload");

        $options[] = array("name" => "Custom Favicon",
            "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
            "id" => "replican_favicon",
            "type" => "upload");

        $options[] = array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);

        //Background Image
        $options[] = array("name" => "Custom Backgrounds",
            "type" => "saperate",
            "class" => "saperator");
       
        $options[] = array("name" => "Background Image",
            "desc" => "Choose a suitable background. Optimal width is 1900px and height is 1200px.",
            "id" => "replican_backgrndbg",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Front-Page Blog Section Background Color",
            "desc" => "Type the hashcode of your desired color, you want in the blog section on front-page.",
            "id" => "replican_blogbackgrnd",
            "std" => "",
            "type" => "text");

        //Home Page Slider Setting
        $options[] = array("name" => "Slider Settings",
            "type" => "heading");

        //First Slider
        $options[] = array("name" => "First Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "First Slider Image",
            "desc" => "The optimal size of the image is 770 px wide x 393 px height, but it can be varied as per your requirement. Pease upload all images having similar height width.",
            "id" => "replican_slideimage1",
            "std" => "",
            "type" => "upload");
		
        //Second Slider
        $options[] = array("name" => "Second Slider",
            "type" => "saperate",
            "class" => "saperator");
        $options[] = array("name" => "Second Slider Image",
            "desc" => "The optimal size of the image is 770 px wide x 393 px height, but it can be varied as per your requirement. Pease upload all images having similar height width.",
            "id" => "replican_slideimage2",
            "std" => "",
            "type" => "upload");

        //Third Slider
        $options[] = array("name" => "Third Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Third Slider Image",
            "desc" => "The optimal size of the image is 770 px wide x 393 px height, but it can be varied as per your requirement. Pease upload all images having similar height width.",
            "id" => "replican_slideimage3",
            "std" => "",
            "type" => "upload");


        //Fourth Slider
        $options[] = array("name" => "Fourth Slider",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Fourth Slider Image",
            "desc" => "The optimal size of the image is 770 px wide x 393 px height, but it can be varied as per your requirement. Pease upload all images having similar height width.",
            "id" => "replican_slideimage4",
            "std" => "",
            "type" => "upload");


        //Fifth Slider
        $options[] = array("name" => "Add more images using Shortcode",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Add More",
            "desc" => "Upload an image to the media, copy the link and paste in the shortcode below. [sliderimage]Paste the image source link here[/sliderimage] . You can add as many slider images as you want. Please use images with similar size.",
            "id" => "replican_add_more_slider",
            "std" => "",
            "type" => "textarea");

        //****=============================================================================****//
        //HomePage four column feature		
        $options[] = array("name" => "Welcome Box",
            "type" => "heading");


        // Welcome Box

        $options[] = array("name" => "Welcome Box",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Welcome Heading",
            "desc" => "Here you can mention a suitable title that will be displayed in the welcome box.",
            "id" => "replican_welcome_heading",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Welcome Text",
            "desc" => "Mention the description for the welcome box.",
            "id" => "replican_welcome_text",
            "std" => "",
            "type" => "textarea");


        // About Section
		$options[] = array("name" => "About Box",
            "type" => "heading");
			
        $options[] = array("name" => "About",
            "type" => "saperate",
            "class" => "saperator");

        $options[] = array("name" => "Image",
            "desc" => "The optimal size of the image is 270 px wide x 321 px height, but it can be varied as per your requirement.",
            "id" => "replican_about_image",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => "Title",
            "desc" => "Here you can mention a suitable title that will display the title in about section.",
            "id" => "replican_about_title",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Sub Title",
            "desc" => "Mention the URL for Sub Title",
            "id" => "replican_about_subtitle",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => "Description",
            "desc" => "Here you can mention a suitable title that will display the small description in about section.",
            "id" => "replican_about_description",
            "std" => "",
            "type" => "textarea");
		
		$options[] = array("name" => "List Pad 1",
            "desc" => "Mention the list items using following shorcode [listpad url='http://www.example.com'] Your Text [/listpad].",
            "id" => "replican_about_list_pad1",
            "std" => "[listpad url='http://www.example.com'] Your Text [/listpad]",
            "type" => "textarea");
		
		$options[] = array("name" => "List Pad 2",
            "desc" => "Mention the list items using following shorcode [listpad url='http://www.example.com'] Your Text [/listpad].",
            "id" => "replican_about_list_pad2",
            "std" => "[listpad url='http://www.example.com'] Your Text [/listpad]",
            "type" => "textarea");
		
	//****================================================================****//
        //Homepage Gallery
        $options[] = array("name" => "Home Gallery",
            "type" => "heading");

        $options[] = array("name" => "Home Page Gallery Heading",
            "desc" => "Mention the heading for your Gallery here.",
            "id" => "replican_homepage_gallery_heading",
            "std" => "",
            "type" => "text");

		
//****================================================****//
//****---This code is used for creating color styleshteet options---****//							
//****================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");
       
        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add your custom CSS code to your theme by writing the code in this block.",
            "id" => "replican_customcss",
            "std" => "",
            "type" => "textarea");

//****=============================================================================****//
//****-------------This code is used for creating social logos options-------------****//					
//****=============================================================================****//

        $options[] = array("name" => "Social Icons",
            "type" => "heading");

        $options[] = array("name" => "Facebook URL",
            "desc" => "Mention the URL of your Facebook here.",
            "id" => "replican_facebook",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Twitter URL",
            "desc" => "Mention the URL of your Twitter here.",
            "id" => "replican_twitter",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Google+ URL",
            "desc" => "Mention the URL of your Google+ here.",
            "id" => "replican_google",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Rss Feed URL",
            "desc" => "Mention the URL of your Rss Feed here.",
            "id" => "replican_rss",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Pinterest URL",
            "desc" => "Mention the URL of your Pinterest here.",
            "id" => "replican_pinterest",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => "Linkedin",
            "desc" => "Mention the URL of your Linkedin here.",
            "id" => "replican_linkedin",
            "std" => "",
            "type" => "text");

//****=============================================================================****//
//****-------------This code is used for creating Bottom Footer Setting options-------------****//					
//****=============================================================================****//			

        replican_update_option('of_template', $options);
        replican_update_option('of_themename', $themename);
        replican_update_option('of_shortname', $shortname);
    }

}
?>
