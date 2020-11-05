<?php
/**
 * Returns Header for all pages with standard template (also index.php pages)
 * 
 * @package Amora_Meals
 */

    require_once(__DIR__ . "/overview_cta_process.php");

    function standard_hero( $blog_id, $customer_class = "" ) {

        $header_form_in_use = get_post_meta($blog_id, 'standardized_header', TRUE); //Check to see if standard header with custom form is being called
        $header_standard_classes = "entry-header jumbotron";

        if ( $header_form_in_use > 0 ) { //if statement determine whether the header will have custom form data
            /**
             * Check for background image
             */

            $header_background_call = wp_get_attachment_url(get_post_meta($blog_id, 'header_background_image', TRUE));
            $header_background = ( strlen($header_background_call) > 0 ) ? $header_background_call : "";
            $header_background_webp = ( strlen($header_background) > 0 ) ? ' background-image: url(' . $header_background . ')' : '';


            /**
             * Check for custom classes to add to header tag
             */

            $header_custom_classes_call = get_post_meta($blog_id, 'header_custom_class', TRUE);
            $header_custom_classes = ( strlen($header_custom_classes_call) > 0 ) ? $header_custom_classes_call : 'header-theme--' . $blog_id;

            /**
             * Check for a featured image
             */

            $img_id = get_post_meta($blog_id, 'header_featured_image', TRUE);
            //pull image meta
            $header_featured_image = wp_get_attachment_url($img_id);
            $header_featured_alt = get_post_meta($img_id , '_wp_attachment_image_alt', true);

            //pull shortcode meta
            $featured_left_shortcode = get_post_meta($blog_id, 'featured_shortcode', TRUE);
            $description_right_shortcode = get_post_meta($blog_id, 'header_description_shortcode', TRUE);


            /**
             * Check for page title. Default to get_the_title if custom title wasn't entered
             */

            $header_title = ( get_post_meta($blog_id, 'header_title', TRUE) ) ? get_post_meta($blog_id, 'header_title', TRUE) : get_the_title($blog_id);

            /**
             * Start building out header and content wrapper
             */

            $header_wrapper = "<header class='$header_standard_classes $header_custom_classes $customer_class' style='background-image: url($header_background); $header_background_webp'>";
            $header_content_wrap = "<div class='header-content container'>";

            $header_customer_logo = ( get_post_meta($blog_id, 'header_customer_logo', TRUE) ) ? wp_get_attachment_image(get_post_meta($blog_id, 'header_customer_logo', TRUE)): "";

            //Left content (text, cta, etc)
            $content_left_markup = "<div class='header-content-container header-content-container-left'>";
            $content_left_markup .= $header_customer_logo;

            //Get Custom IDs field
            $custom_ids = get_field('custom_ids');

            if ( $custom_ids['subtitle'] ) {
                $custom_id_subtitle = $custom_ids['subtitle'];
                $content_left_markup .= '<h2 id="' . $custom_id_subtitle . '">' . get_post_meta($blog_id, 'header_subtitle', TRUE) . '</h2>';
            } else {
                $content_left_markup .= '<h2>' . get_post_meta($blog_id, 'header_subtitle', TRUE) . '</h2>';
            }

            if ( $custom_ids['title'] ) {
                $custom_id_title = $custom_ids['title'];
                $content_left_markup .= '<h1 id="' . $custom_id_title . '" class="entry-title display-4">' . $header_title . '</h1>';
            } else {
                $content_left_markup .= '<h1 class="entry-title display-4">' . $header_title . '</h1>';
            }

            if ( $custom_ids['blurb'] ) {
                $custom_id_blurb = $custom_ids['blurb'];
                $content_left_markup .= '<p id="' . $custom_id_blurb . '" class="lead">' . get_post_meta($blog_id, 'header_description', TRUE)  . '</p>';
            } else {
                $content_left_markup .= '<p>' . get_post_meta($blog_id, 'header_description', TRUE)  . '</p>';
            }

            /**
             * Execute shortcodes
             */

            if ( strlen($description_right_shortcode) > 0 ) :
                $description_shortcode = do_shortcode($description_right_shortcode);
                $content_left_markup .= $description_shortcode;
            endif;

            $content_left_markup .= overview_cta_process();
            $content_left_markup .= "</div>";

            if ( strlen($header_featured_image) > 0 ) { //if there's a second image, aka the featured image

                $featured_image = "<img src='" . $header_featured_image . "' alt='$header_featured_alt' />";

                //Right content (image)
                $content_right_markup = "<div class='header-content-container header-content-container-right'>";
                $content_right_markup .= "<div class='image-container'>$featured_image</div>";
                $content_right_markup .= "</div>";

                return $header_wrapper . $header_content_wrap . $content_left_markup . $content_right_markup . "</div></header>";

            }

            if ( strlen($featured_left_shortcode) > 0 ) {

                //Right content (shortcode)
                $featured_left_shortcode = get_post_meta($blog_id, 'featured_shortcode', TRUE);
                
                $content_right_markup = "<div class='header-content-container header-content-container-right'>";
                $content_right_markup .= do_shortcode($featured_left_shortcode);
                $content_right_markup .= "</div>";

                return $header_wrapper . $header_content_wrap . $content_left_markup . $content_right_markup . "</div></header>";

            }

            return $header_wrapper . $header_content_wrap . $content_left_markup  . "</div></header>";
        }

        /**
         * Start building out header and content wrapper
         */
        $header_wrapper = "<header class='$header_standard_classes $header_custom_classes' style='background-image: url($header_background); background-image: url($header_background_webp);'>";
        $header_content_wrap = "<div class='header-content header-content-theme--overview'>";

        $content_left_markup = "<div class='header-content-container'>";
        $content_left_markup .= '<h1 class="entry-title display-4">' . get_the_title($blog_id) . '</h1>';
        $content_left_markup .= "</div>";

        return $header_wrapper . $header_content_wrap . "</div></header>";

        
    }

?>