<?php

$add_css_animation = array(
  "type" => "dropdown",
  "heading" => __("CSS Animation", "js_composer"),
  "param_name" => "css_animation",
  "admin_label" => true,
  "value" => array(__("No", "js_composer") => '', __("Top to bottom", "js_composer") => "top-to-bottom", __("Bottom to top", "js_composer") => "bottom-to-top", __("Left to right", "js_composer") => "left-to-right", __("Right to left", "js_composer") => "right-to-left", __("Appear from center", "js_composer") => "appear"),
  "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
);

/*-----------------------------------------------------------------------------------*/
/*	Add aditional params to row
/*-----------------------------------------------------------------------------------*/

vc_remove_element("vc_row");
vc_map( array(
  "name" => __("Row", "js_composer"),
  "base" => "vc_row",
  "is_container" => true,
  "icon" => "icon-wpb-row",
  "show_settings_on_create" => false,
  "category" => __('Content', 'js_composer'),
  "params" => array(
    array(
      "type" => "textfield",
      "heading" => __("Extra class name", "js_composer"),
      "param_name" => "el_class",
      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
    ),
    array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => __("Full Width Section"),
         "param_name" => "full_width",
         "description" => __("Enable this for a full width section"),
         "value" => Array(__("Yes, please") => true),
      ),
	array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Custom Background Colour"),
         "param_name" => "bg_colour",
         "description" => __("Specify a custom background colour")
      ),
    array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Background Image"),
         "param_name" => "background_bg",
         "description" => __("Upload a custom background image")
      ),
    array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "heading" => __("Will you use a dark background?"),
         "param_name" => "row_dark",
         "description" => __("Enable this, if you plan on using a dark background. This will add contrast to the content"),
         "value" => Array(__("Dark background?") => true),
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "parallax_bg",
         "value" => Array(__("Enable parallax background effect.") => true),
         "description" => __("This option will enable the parallax effect. Background image must set.")
      ),
      array(
     	"type" => "",
     	"param_name" => "advancedoptions",
         "holder" => "div",
         "class" => "",
         "heading" => __("Advance options"),
         "description" => __("These are some super genius options. Please see documentation on more information about these.")
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "isotope",
         "value" => Array(__("Enable isotope grid.") => true),
         "description" => __("This option will enable the isotope grid.")
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "row_large",
         "value" => Array(__("Large Row") => true),
         "description" => __("Add extra padding on top and bottom of the the row.")
      ),
     array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "remove_top_margin",
         "value" => Array(__("Remove top margin.") => true),
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "remove_bottom_margin",
         "value" => Array(__("Remove bottom margin.") => true),
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "remove_top_padding",
         "value" => Array(__("Remove top padding.") => true),
      ),
      array(
         "type" => "checkbox",
         "holder" => "div",
         "class" => "",
         "param_name" => "remove_bottom_padding",
         "value" => Array(__("Remove bottom padding.") => true),
      ),
  ),
  "js_view" => 'VcRowView'
) );

/*-----------------------------------------------------------------------------------*/
/*	Features
/*-----------------------------------------------------------------------------------*/
wpb_map( array(
   "name" => __("Features"),
   "base" => "feature",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Name"),
         "param_name" => "icon_name",
         "description" => __("Enter the name of the icon you want to display")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Title"),
         "param_name" => "title",
         "description" => __("Enter the title for the feature element")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description"),
         "param_name" => "description",
         "description" => __("Enter a short description for the feature")
      ),
      $add_css_animation,
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Timeline
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Timeline"),
   "base" => "timeline",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
    	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon"),
         "param_name" => "timeline_icon",
         "description" => __("Select an icon to display in the timeline. Please go to Dashboard->Documentation to view list of icons.")
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Icon Colour"),
         "param_name" => "icon_colour",
         "description" => __("Specify a custom icon colour")
      ),
      array(
         "type" => "colorpicker",
         "holder" => "div",
         "class" => "",
         "heading" => __("Circle Colour"),
         "param_name" => "circle_colour",
         "description" => __("Specify a custom circle colour")
      ),

      array(
         "type" => "textarea_html",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content"),
         "param_name" => "content",
         "description" => __("Add your content")
      ),
      $add_css_animation,
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Logo Carousel
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Logo Carousel"),
   "base" => "logo_carousel",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
    	array(
         "type" => "attach_images",
         "holder" => "div",
         "class" => "",
         "heading" => __("Logo"),
         "param_name" => "images",
         "description" => __("Upload your logos. We recommend a minimum of 5.")
      )
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Counters
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Counter"),
   "base" => "counter",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
    	array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter Number"),
         "param_name" => "counter_number",
         "description" => __("Specify the counter number. Please use numbers only. ")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter Number Prepend"),
         "param_name" => "counter_prepend",
         "description" => __("Prepend a character in front of the number.")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter Number Append"),
         "param_name" => "counter_append",
         "description" => __("Append a character in after of the number.")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter Text"),
         "param_name" => "counter_text",
         "description" => __("The text that will display beneath the number")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Counter Sub Text"),
         "param_name" => "counter_subtext",
         "description" => __("The smaller text that will display beneath the main text")
      ),
      $add_css_animation,
   )

) );


/*-----------------------------------------------------------------------------------*/
/*	Team Member
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Team Member"),
   "base" => "team_member",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Name"),
         "param_name" => "name",
         "value" => __("John Smith"),
         "description" => __("Enter the team members name")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Position"),
         "param_name" => "position",
         "value" => __("CEO"),
         "description" => __("Enter the team members position")
      ),
      array(
         "type" => "attach_image",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image"),
         "param_name" => "image_src",
         "description" => __("Upload an image")
      ),
       array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image Link"),
         "param_name" => "image_link",
         "description" => __("Link the image to a page")
      ),
       array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Description"),
         "param_name" => "description",
         "description" => __("Write a description")
      ),
       array(
         "type" => "exploded_textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Social Buttons"),
         "param_name" => "social_buttons",
         "value" => __("http://www.facebook.com|facebook,http://www.twitter.com|twitter,http://www.pinterest.com|pinterest"),
         "description" => __("Input social buttons here. Divide URL and Icon name with line break(enter). Example: http://www.facebook.com|facebook <br> Visit this page, for a full list of icons: <a href='http://fortawesome.github.io/Font-Awesome/icons/'>http://fortawesome.github.io/Font-Awesome/icons/</a>")
      ),
      $add_css_animation,
   )
) );

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Pricing Table"),
   "base" => "pricing_table",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
   "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Price"),
         "param_name" => "price",
         "value" => __("$|20"),
         "description" => __("Enter the currency and price for this package. e.g $|20")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Cycle"),
         "param_name" => "cycle",
         "value" => __("month"),
         "description" => __("Enter the billing cycle. e.g month/year/lifetime")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Package"),
         "param_name" => "package",
         "value" => __("Starter"),
         "description" => __("Enter a name for this package")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Package Tag"),
         "param_name" => "package_tag",
         "value" => __("Popular"),
         "description" => __("Add a tag beside the package name. e.g Popular. Leave blank for no tag.")
      ),
      array(
         "type" => "exploded_textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Features"),
         "param_name" => "features",
         "description" => __("Enter the features for this package. Divide each feature with a line break(enter)")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Button Value"),
         "param_name" => ("button_value"),
         "value" => __("Sign up now"),
         "description" => __("Enter a value for the button")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Link"),
         "param_name" => "button_link",
         "description" => __("Enter a link which you would like the button to point to")
      )
   )
) );

/*-----------------------------------------------------------------------------------*/
/*	Recent Work
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Recent Work"),
   "base" => "recent_work",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of posts"),
         "param_name" => "posts_per_page",
         "value" => __("3"),
         "description" => __("Specify how many posts you would like to display")
      )
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Recent Work (Full Width)
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Recent Work (Full Width)"),
   "base" => "recent_work_full_width",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of posts"),
         "param_name" => "posts_per_page",
         "value" => __("4"),
         "description" => __("Specify how many posts you would like to display. For best results, it is recommended that all your portfolio images are the same size. Please upload your portfolio images by clicking on Portfolio in the dashboard")
      ),
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Image width"),
         "param_name" => "image_width",
         "value" => __("25%"),
         "description" => __("Specify a custom image width. The default is 25% for 4 columns. Use 33.3% for 3 columns. Additional images will automatically be moved to the next row.")
      ),
      
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Recent Blog Posts
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Recent Blog Posts"),
   "base" => "recent_posts",
   "class" => "",
   "icon" => "icon-wpb-row",
   "category" => __('Content'),
    "params" => array(
      array(
         "type" => "textfield",
         "holder" => "div",
         "class" => "",
         "heading" => __("Number of posts"),
         "param_name" => "posts_per_page",
         "value" => __("3"),
         "description" => __("Specify how many posts you would like to display")
      )
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Testimonial"),
   "base" => "testimonial",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
      array(
         "type" => "textarea",
         "holder" => "div",
         "class" => "",
         "heading" => __("Content"),
         "param_name" => "content",
         "description" => __("Add your content")
      )
   )

) );

/*-----------------------------------------------------------------------------------*/
/*	Empty Space
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
  "name" => __("Empty Space", "js_composer"),
  "base" => "empty_space",
  "is_container" => true,
  "icon" => "icon-wpb-row",
  "show_settings_on_create" => false,
  "category" => __('Content', 'js_composer'),
) );

/*-----------------------------------------------------------------------------------*/
/*	Dividers
/*-----------------------------------------------------------------------------------*/

wpb_map( array(
   "name" => __("Dividers"),
   "base" => "divider",
   "icon" => "icon-wpb-row",
   "class" => "",
   "category" => __('Content'),
    "params" => array(
      array(
         "type" => "dropdown",
         "holder" => "div",
         "class" => "",
         "heading" => __("Choose your style"),
         "param_name" => "style",
          "value" => array(__("Solid", "js_composer") => 'divider-solid', __("Dotted", "js_composer") => "divider-dotted", __("Dashed", "js_composer") => "divider-dashed", __("Mini Shadow", "js_composer") => "divider-minishadow", __("Solid Thick", "js_composer") => "divider-solidthick"),
         "description" => __("Choose which style you would like for the divider")
      )
   )
 ) );
?>