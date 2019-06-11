<?php

    /**
     * @package Region Halland ACF Drift Info
     */
    /*
    Plugin Name: Region Halland ACF Drift Info
    Description: ACF-fält för drift info
    Version: 2.0.0
    Author: Roland Hydén
    License: Free to use
    Text Domain: regionhalland
    */

    // vid 'init', anropa funktionen region_halland_register_utbildning()
    add_action( 'init', 'region_halland_register_drift_info' );

    // Denna funktion registrerar en ny post_type och gör den synlig i wp-admin
    function region_halland_register_drift_info() {
        
        // Vilka labels denna post_type ska ha
        $labels = array(
                'name'                  => _x( 'Drift info', 'Post type general name', 'regionhalland' ),
                'singular_name'         => _x( 'Drift info', 'Post type singular name', 'regionhalland' ),
                'menu_name'             => _x( 'Drift info', 'Admin Menu text', 'regionhalland' ),
                'add_new'               => __( 'Skapa ny', 'regionhalland' ),
                'add_new_item'          => __( 'Skapa ny drift info', 'regionhalland' ),
                'edit_item'             => __( 'Editera drift info', 'regionhalland' )
            );
        
        // Inställningar för denna post_type 
        $args = array(
            'labels' => $labels,
            'rewrite' => array('slug' => 'driftinfo'),
            'show_ui' => true,
            'has_archive' => false,
            'publicly_queryable' => true,
            'public' => true,
            'query_var' => false,
            'menu_icon' => 'dashicons-megaphone',
            'supports' => array( 'title', 'editor', 'author', 'revisions')
        );

        // Registrera post_type
        register_post_type('driftinfo', $args);
        
    }

    // Anropa function om ACF är installerad
    add_action('acf/init', 'my_acf_add_page_drift_info_field_groups');

    // Function för att lägga till "field groups"
    function my_acf_add_page_drift_info_field_groups() {

        // Om funktionen existerar
        if (function_exists('acf_add_local_field_group')):

            // Skapa formlärfält
            acf_add_local_field_group(array(
                
                'key' => 'group_1000016',
                'title' => 'Info om driftstörning',
                'fields' => array(
                    0 => array( 
                      'key' => 'field_1000017', 
                      'label' => __('Starttid', 'regionhalland'), 
                      'name' => 'name_1000018', 
                      'type' => 'date_time_picker', 
                      'instructions' => __('Fyll i när driftstörningen beräknas starta (obligatoriskt) ', 'regionhalland'), 
                      'required' => 1, 
                      'conditional_logic' => 0, 
                      'wrapper' => array( 
                          'width' => '', 
                          'class' => '', 
                          'id' => '', 
                      ), 
                      'display_format' => 'Y-m-d H:i:s', 
                      'return_format' => 'Y-m-d H:i:s', 
                      'first_day' => 1, 
                    ), 
                    1 => array( 
                      'key' => 'field_1000019', 
                      'label' => __('Sluttid', 'regionhalland'), 
                      'name' => 'name_1000020', 
                      'type' => 'date_time_picker', 
                      'instructions' => __('Fyll i när driftstörningen beräknas vara klar (ej obligatoriskt).', 'regionhalland'), 
                      'required' => 0, 
                      'conditional_logic' => 0, 
                      'wrapper' => array( 
                          'width' => '', 
                          'class' => '', 
                          'id' => '', 
                      ), 
                      'display_format' => 'Y-m-d H:i:s', 
                      'return_format' => 'Y-m-d H:i:s', 
                      'first_day' => 1, 
                    ),
                    2 => array(
                        'key' => 'field_1000021',
                        'label' => __('Status', 'regionhalland'),
                        'name' => 'name_1000022',
                        'type' => 'select',
                        'instructions' => __('Ange status för denna driftstörning', 'regionhalland'),
                        'required' => 1,
                        'conditional_logic' => array(
                            0 => array(
                                0 => array(
                                    'field' => 'field_1000023',
                                    'operator' => '!=',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            1 => __('Akut', 'regionhalland'),
                            2 => __('Enligt plan', 'regionhalland'),
                            3 => __('Avslutad', 'regionhalland'),
                        ),
                        'default_value' => array(
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                    3 => array(
                        'key' => 'field_1000058',
                        'label' => __('Områden', 'halland'),
                        'name' => 'name_1000059',
                        'type' => 'select',
                        'instructions' => __('Välj ett eller flera områden för denna driftstörning', 'regionhalland'),
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            1 => __('IT/Telefoni', 'regionhalland'),
                            2 => __('Fastighet', 'regionhalland'),
                        ),
                        'default_value' => '',
                        'allow_null' => 0,
                        'multiple' => 1,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                    4 => array(
                        'key' => 'field_1000060',
                        'label' => __('Uppföljning', 'halland'),
                        'name' => 'name_1000061',
                        'type' => 'repeater',
                        'instructions' => __('Klicka på "Lägg till rad" för att lägga till en ny uppföljning.', 'halland'),
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 25,
                        'layout' => 'row',
                        'button_label' => '',
                        'sub_fields' => array(
                            0 => array(
                                'key' => 'field_1000062',
                                'label' => 'Rubrik',
                                'name' => 'name_1000063',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => [
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ],
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => '',
                                'new_lines' => '',
                            ),
                            1 => array(
                                'key' => 'field_1000064',
                                'label' => 'Uppföljning',
                                'name' => 'name_1000065',
                                'type' => 'textarea',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => [
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ],
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'rows' => '',
                                'new_lines' => '',
                            ),
                            2 => array( 
                              'key' => 'field_1000066', 
                              'label' => __('Tidpunkt', 'regionhalland'), 
                              'name' => 'name_1000067', 
                              'type' => 'date_time_picker', 
                              'instructions' => __('Välj tidpunkt.', 'regionhalland'), 
                              'required' => 0, 
                              'conditional_logic' => 0, 
                              'wrapper' => array( 
                                  'width' => '', 
                                  'class' => '', 
                                  'id' => '', 
                              ), 
                              'display_format' => 'Y-m-d H:i:s', 
                              'return_format' => 'Y-m-d H:i:s', 
                              'first_day' => 1, 
                            ),
                        ),
                ),  
                ),
                'location' => array(
                    0 => array(
                        0 => array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'driftinfo',
                        ),
                    )
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => 1,
                'description' => '',
            ));

        endif;

    }

    // *********************************************
    // *** Hämta driftstörningar baserat på type ***
    // *********************************************
    function get_region_halland_drift_info($type = 1) {

        switch ($type) {
            case '1':
                $args = get_args_drift_info_alla_pagaende();
                $statusName = "Pågående";
                break;
            case '2':
                $args = get_args_drift_info_it_telefoni_pagaende();
                $statusName = "Pågående";
                break;
            case '3':
                $args = get_args_drift_info_fastighet_pagaende();
                $statusName = "Pågående";
                break;
            case '4':
                $args = get_args_drift_info_alla_kommande();
                $statusName = "Kommande";
                break;
            case '5':
                $args = get_args_drift_info_it_telefoni_kommande();
                $statusName = "Kommande";
                break;
            case '6':
                $args = get_args_drift_info_fastighet_kommande();
                $statusName = "Kommande";
                break;
            case '7':
                $args = get_args_drift_info_alla_avslutade();
                $statusName = "Avslutade";
                break;
            case '8':
                $args = get_args_drift_info_it_telefoni_avslutade();
                $statusName = "Avslutade";
                break;
            case '9':
                $args = get_args_drift_info_fastighet_avslutade();
                $statusName = "Avslutade";
                break;
            case '10':
                $args = get_args_drift_info_alla_avslutade_senaste_2_timmarna();
                $statusName = "Avslutade";
                break;
            default:
                $args = get_args_drift_info_alla_pagaende();
                $statusName = "Pågående";
         }

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time   = get_field_object('field_1000017', $page->ID);
            $field_end_time     = get_field_object('field_1000019', $page->ID);
            $field_status       = get_field_object('field_1000021', $page->ID);
            $field_omrade       = get_field_object('field_1000058', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time   = $field_start_time['value'];
            $page->end_time     = $field_end_time['value'];
            $page->status       = $field_status['value'];
            $page->omrade       = $field_omrade['value'];

            // Lägg till sidans url
            $page->url          = get_page_link($page->ID);

            // Text + formatering för label
            $page->status_name  = $statusName;
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

            // Hämta ACF-objektet för link
            $page_field_object      = get_field('name_1000061', $page->ID);

            $page->follow_up = get_region_halland_acf_driftinfo_all_follow_up($page_field_object);

            $page->date_updated = get_region_halland_acf_driftinfo_date_updated($page_field_object);
        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // ***********************
    // *** Alla - Pågående ***
    // ***********************
    function get_args_drift_info_alla_pagaende() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '<=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ******************************
    // *** IT/Telefoni - Pågående ***
    // ******************************
    function get_args_drift_info_it_telefoni_pagaende() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000059',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '<=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ****************************
    // *** Fastighet - Pågående ***
    // ****************************
    function get_args_drift_info_fastighet_pagaende() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000059',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '<=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ***********************
    // *** Alla - kommande ***
    // ***********************
    function get_args_drift_info_alla_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '>=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ******************************
    // *** IT/Telefoni - kommande ***
    // ******************************
    function get_args_drift_info_it_telefoni_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000059',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '>=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ****************************
    // *** Fastighet - kommande ***
    // ****************************
    function get_args_drift_info_fastighet_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000059',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'       => 'name_1000018',
                    'compare'   => '>=',
                    'value'     => $date,
                )
            )
        );

        return $args;
    }

    // ************************
    // *** Alla - avslutade ***
    // ************************
    function get_args_drift_info_alla_avslutade() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('3'),
                    'compare' => 'IN'
                )
            )
        );

        return $args;
    }

    // *******************************
    // *** IT/Telefoni - avslutade ***
    // *******************************
    function get_args_drift_info_it_telefoni_avslutade() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000059',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000022',
                    'value' => array('3'),
                    'compare' => 'IN'
                )
            )
        );

        return $args;
    }

    // *****************************
    // *** Fastighet - avslutade ***
    // *****************************
    function get_args_drift_info_fastighet_avslutade() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000059',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000022',
                    'value' => array('3'),
                    'compare' => 'IN'
                )
            )
        );

        return $args;
    }

    // ************************************
    // *** Avslutade senaste 2 timmarna ***
    // ************************************
    function get_args_drift_info_alla_avslutade_senaste_2_timmarna() {

        // Tid just nu minys två timmar
        $dateMinusTwoHours = date("Y-m-d H:i:s", time()-7200);

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'   => -1,
            'post_type'     => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                'relation'      => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                )
            ),
            'date_query' => array(
                array(
                    'column' => 'post_modified',
                    'after' => $dateMinusTwoHours,
                    'inclusive' => true,
                )
            )
        );

        return $args;
    }

    // *************************************
    // *** Lägga all folow-up i en array ***
    // *************************************
    function get_region_halland_acf_driftinfo_all_follow_up($page_field_object) {

        $myData = array();
        if ($page_field_object) {
            foreach ($page_field_object as $value) {
                $strRubrik = $value['name_1000063'];
                $strContent = $value['name_1000065'];
                $dtmTime = $value['name_1000067'];
                array_push($myData, array(
                   'rubrik' => $strRubrik,
                   'content' => $strContent,
                   'time' => $dtmTime
                ));
            }
        }

        return $myData;

    }

    // *******************************************
    // *** Funktiuon som beräknar update-datum ***
    // *******************************************
    function get_region_halland_acf_driftinfo_date_updated($page_field_object) {

        $myDate = "";
        if ($page_field_object) {
            foreach ($page_field_object as $value) {
                $dtmTime = $value['name_1000067'];
                if ($myDate == "") {
                    $myDate = $dtmTime;
                } else {
                    if ($dtmTime > $myDate) {
                        $myDate = $dtmTime;
                    }
                }
            }
        }

        return $myDate;

    }

    // ******************************************
    // *** Funktiuon för att få områdets namn ***
    // ******************************************
    function get_region_halland_drift_omrade_namn($id) {
        switch ($id) {
            case 1:
                return "IT/Telefoni";
                break;
            case 2:
                return "Fastighet";
                break;
        } 
    }

    // ******************************************
    // *** Funktiuon för att ta bort sekunder ***
    // ******************************************
    function get_region_halland_drift_fix_date($date) {
        return substr($date,0,16);
    }

    // ***********************************************
    // *** Hämta antal av respektive driftstörning ***
    // ***********************************************
    function get_region_halland_drift_info_get_numbers() {
        
        // Preparera array
        $myNumbers = array();
        $myNumbers['alla-pagaende'] = count(get_posts(get_args_drift_info_alla_pagaende()));
        $myNumbers['it-telefoni-pagaende'] = count(get_posts(get_args_drift_info_it_telefoni_pagaende()));
        $myNumbers['fastighet-pagaende'] = count(get_posts(get_args_drift_info_fastighet_pagaende()));
        $myNumbers['alla-kommande'] = count(get_posts(get_args_drift_info_alla_kommande()));
        $myNumbers['it-telefoni-kommande'] = count(get_posts(get_args_drift_info_it_telefoni_kommande()));
        $myNumbers['fastighet-kommande'] = count(get_posts(get_args_drift_info_fastighet_kommande()));
        $myNumbers['alla-avslutade'] = count(get_posts(get_args_drift_info_alla_avslutade()));
        $myNumbers['it-telefoni-avslutade'] = count(get_posts(get_args_drift_info_it_telefoni_avslutade()));
        $myNumbers['fastighet-avslutade'] = count(get_posts(get_args_drift_info_fastighet_avslutade()));

        // Return array
        return $myNumbers;  

    }
    
    // Metod som anropas när pluginen aktiveras
    function region_halland_acf_drift_info_activate() {
        
        // Vi aktivering, registrera post_type "utbildning"
        region_halland_register_drift_info();

        // Tala om för wordpress att denna post_type finns
        // Detta gör att permalink fungerar
        flush_rewrite_rules();
    }

    // Metod som anropas när pluginen avaktiveras
    function region_halland_acf_drift_info_deactivate() {
        // Ingenting just nu...
    }
    
    // Vilken metod som ska anropas när pluginen aktiveras
    register_activation_hook( __FILE__, 'region_halland_acf_drift_info_activate');

    // Vilken metod som ska anropas när pluginen avaktiveras
    register_deactivation_hook( __FILE__, 'region_halland_acf_drift_info_deactivate');

?>