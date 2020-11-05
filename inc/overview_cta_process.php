<?php
/**
 * Featured Speakers
 *
 *
 * @package Amora_Meals
 */

    function overview_cta_process() {
        if ( get_post_meta(get_the_ID(), 'header_cta_available', TRUE) == 1 ) {

            //Get Custom IDs field
            $custom_ids = get_field('custom_ids');

            $cta_obj = get_field('header_cta');
            $cta_title = $cta_obj['cta_title'];
            $secondary_cta_obj = get_field('secondary_cta');
            $secondary_cta_title = $secondary_cta_obj['cta_title'];

            $class = "btn btn-primary";
            $secondary_class = "btn btn-secondary";

            $markup;

            $primary_CTA_ID = ( $custom_ids['primary_cta'] ) ? " id='" . $custom_ids['primary_cta'] . "'":" ";
            $secondary_CTA_ID = ( $custom_ids['secondary_cta'] ) ? " id='" . $custom_ids['secondary_cta'] . "'":" ";
            
            if (strlen($cta_title) > 0 ) {
                switch( $cta_obj['cta_type'] ) {
                    case 'Internal URL':
                        $markup = '<a' . $primary_CTA_ID . ' href="' . $cta_obj['cta_url']. '" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                    case 'External URL':
                        $markup = '<a' . $primary_CTA_ID . ' href="' . $cta_obj['cta_external_link']. '" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                    case 'Document':
                        $markup = '<a' . $primary_CTA_ID . ' href="' . $cta_obj['cta_document']. '" target="_blank" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                    case 'Email Address':
                        $markup = '<a' . $primary_CTA_ID . ' href="mailto:' . $cta_obj['cta_email_link']. '" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                    case 'Modal':
                        $markup = '<a id="' . $cta_obj['cta_id'] . '" href="#" class="modal-trigger ' . $class . '">' . $cta_title . '</a>' ;
                        $markup .= do_shortcode($cta_obj['cta_modal_shortcode']);
                        break;
                    case 'Hashtag':
                        $markup .= '<a' . $primary_CTA_ID . ' href="#' . $cta_obj['cta_hashtag'] . '" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                    default:
                        $markup = '<a' . $primary_CTA_ID . ' href="' . $cta_obj['cta_url']. '" class="' . $class . '">' . $cta_title . '</a>' ;
                        break;
                }
            }

            if (strlen($secondary_cta_title) > 0 ) {
                switch( $secondary_cta_obj['cta_type'] ) {
                    case 'Internal URL':
                        $markup .= '<a' . $secondary_CTA_ID . ' href="' . $secondary_cta_obj['cta_url']. '" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                    case 'External URL':
                        $markup .= '<a' . $secondary_CTA_ID . ' href="' . $secondary_cta_obj['cta_external_link']. '" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                    case 'Document':
                        $markup .= '<a' . $secondary_CTA_ID . ' href="' . $secondary_cta_obj['cta_document']. '" target="_blank" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                    case 'Email Address':
                        $markup .= '<a' . $secondary_CTA_ID . ' href="mailto:' . $secondary_cta_obj['cta_email_link']. '" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                    case 'Modal':
                        $markup .= '<a id="' . $secondary_cta_obj['cta_id'] . '" href="#" class="modal-trigger ' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        $markup .= do_shortcode($secondary_cta_obj['cta_modal_shortcode']);
                        break;
                    case 'Hashtag':
                        $markup .= '<a' . $secondary_CTA_ID . ' href="#' . $secondary_cta_obj['cta_hashtag'] . '" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                    default:
                        $markup .= '<a' . $secondary_CTA_ID . ' href="' . $secondary_cta_obj['cta_url']. '" class="' . $secondary_class . '">' . $secondary_cta_title . '</a>' ;
                        break;
                }   
            }

            return $markup;
            

        }
        
    }

?>