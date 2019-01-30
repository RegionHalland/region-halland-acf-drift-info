<?php

	/**
	 * @package Region Halland ACF Drift Info
	 */
	/*
	Plugin Name: Region Halland ACF Drift Info
	Description: ACF-fält för drift info
	Version: 1.0.0
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
        		'edit_item'          	=> __( 'Editera drift info', 'regionhalland' )
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
	        'supports' => array( 'title', 'editor', 'author', 'thumbnail')
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
		              'label' => __('Start-tid', 'regionhalland'), 
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
		              'label' => __('Slut-tid', 'regionhalland'), 
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
			            'key' => 'field_1000024',
			            'label' => __('Område', 'halland'),
			            'name' => 'name_1000025',
			            'type' => 'select',
			            'instructions' => __('Välj ett eller flera områden för denna driftstörning', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'choices' => array(
			                1 => __('IT', 'regionhalland'),
			                2 => __('Telefoni', 'regionhalland'),
			                3 => __('Fastighet', 'regionhalland'),
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
			        	'key' => 'field_1000026',
			            'label' => __('Uppföljning', 'regionhalland'),
			            'name' => 'name_1000027',
			            'type' => 'textarea',
			            'instructions' => __('Följ upp dit ärende. Max 500 tecken.', 'regionhalland'),
			            'required' => 0,
			            'conditional_logic' => 0,
			            'wrapper' => array(
			                'width' => '',
			                'class' => '',
			                'id' => '',
			            ),
			            'default_value' => '',
			            'placeholder' => __('', 'regionhalland'),
			            'maxlength' => 500,
			            'rows' => 5,
			            'new_lines' => '',
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

	// name_1000022 
	// 1 = Pågående
	// 2 = Planerad
	// 3 = Avslutad

    // name_1000025
	// 1 = IT
	// 2 = Telefoni
	// 3 = Fastighet

    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 1 (IT)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mindre än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
    function get_region_halland_drift_info_it_pagaende()
    {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Enligt plan";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 2 (Telefoni)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mindre än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
    function get_region_halland_drift_info_telefoni_pagaende()
    {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Enligt plan";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 3 (Fastighet)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mindre än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
    function get_region_halland_drift_info_fastighet_pagaende()
    {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Enligt plan";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *************************************************
	// *** Hämta alla driftstörningar som är "Pågående" ***
	// *************************************************
	function get_region_halland_drift_info_pagaende_alla() {

		// Preparerar array för att hämta ut driftstörningar
		$args = array( 
			'numberposts'	=> -1,
			'post_type'		=> 'driftinfo',
			'meta_query' => array(
	            'relation'		=> 'AND',
	            array(
	            	'key' => 'name_1000022', 
	                'value' => '1', 
	                'compare' => 'LIKE'
	            )
	        )
		);

		// Hämta valda driftstörningar
		$pages = get_posts($args);
		
		// Loopa igenom valda driftstörningar
		foreach ($pages as $page) {

			// Hämta diverse olika ACF-objekt
			$field_start_time	= get_field_object('field_1000017', $page->ID);
			$field_end_time		= get_field_object('field_1000019', $page->ID);
			$field_status		= get_field_object('field_1000021', $page->ID);
			$field_omrade		= get_field_object('field_1000024', $page->ID);

			// Spara ner ACF-data i page-arrayen
			$page->start_time 	= $field_start_time['value'];
			$page->end_time 	= $field_end_time['value'];
			$page->status 		= $field_status['value'];
			$page->omrade 		= $field_omrade['value'];
			
			// Lägg till sidans url 	
			$page->url 			= get_page_link($page->ID);
			
			$page->follow_up 	= get_field('name_1000027', $page->ID);
		}

		// Returnera valda driftstörningar
		return $pages;

	}

	// *****************************************************
	// *** Hämta alla driftstörningar som är "Planerade" ***
	// *****************************************************
	function get_region_halland_drift_info_planerade_alla() {

		$date = date("Y-m-d H:i:s");
		
		// Preparerar array för att hämta ut driftstörningar
		$args = array( 
			'numberposts'	=> -1,
			'post_type'		=> 'driftinfo',
			'meta_query' => array(
	            'relation'		=> 'AND',
	            array(
	            	'key' => 'name_1000022', 
	                'value' => '2', 
	                'compare' => 'LIKE'
	            ),
			    array(
			        'key'		=> 'name_1000018',
			        'compare'	=> '<=',
			        'value'		=> $date,
			    )
	        )
		);

		// Hämta valda driftstörningar
		$pages = get_posts($args);
		
		// Loopa igenom valda driftstörningar
		foreach ($pages as $page) {

			// Hämta diverse olika ACF-objekt
			$field_start_time	= get_field_object('field_1000017', $page->ID);
			$field_end_time		= get_field_object('field_1000019', $page->ID);
			$field_status		= get_field_object('field_1000021', $page->ID);
			$field_omrade		= get_field_object('field_1000024', $page->ID);

			// Spara ner ACF-data i page-arrayen
			$page->start_time 	= $field_start_time['value'];
			$page->end_time 	= $field_end_time['value'];
			$page->status 		= $field_status['value'];
			$page->omrade 		= $field_omrade['value'];
			
			// Lägg till sidans url 	
			$page->url 			= get_page_link($page->ID);
			
			$page->follow_up 	= get_field('name_1000027', $page->ID);
		}

		// Returnera valda driftstörningar
		return $pages;

	}

	// *****************************************************
	// *** Hämta alla driftstörningar som är "Avslutade" ***
	// *****************************************************
	function get_region_halland_drift_info_avslutade_alla() {

		// Tid just nu minys två timmar
		$dateMinusTwoHours = date("Y-m-d H:i:s", time()-7200);
		
		// Preparerar array för att hämta ut driftstörningar
		$args = array( 
			'numberposts'	=> -1,
			'post_type'		=> 'driftinfo',
			'meta_query' => array(
	            'relation'		=> 'AND',
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

		// Hämta valda driftstörningar
		$pages = get_posts($args);
		
		// Loopa igenom valda driftstörningar
		foreach ($pages as $page) {

			// Hämta diverse olika ACF-objekt
			$field_start_time	= get_field_object('field_1000017', $page->ID);
			$field_end_time		= get_field_object('field_1000019', $page->ID);
			$field_status		= get_field_object('field_1000021', $page->ID);
			$field_omrade		= get_field_object('field_1000024', $page->ID);

			// Spara ner ACF-data i page-arrayen
			$page->start_time 	= $field_start_time['value'];
			$page->end_time 	= $field_end_time['value'];
			$page->status 		= $field_status['value'];
			$page->omrade 		= $field_omrade['value'];
			
			// Lägg till sidans url 	
			$page->url 			= get_page_link($page->ID);
			
			$page->follow_up 	= get_field('name_1000027', $page->ID);
		}

		// Returnera valda driftstörningar
		return $pages;

	}

	// *****************************************************
	// *** Hämta driftstörningar för "IT - Kommande"
    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 1 (IT)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mer än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
	function get_region_halland_drift_info_it_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Kommande";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

	}

	// *************************************************
	// *** "IT - Avslutad"
	// *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 3 (Avslutad)
    // *** name_1000025 = 1 (IT)
    // *** post_modified (avslutad senaste 2 timmarna)
    // *** Sorterad efter "slut_datum" med senast först
    // *****************************************************
	function get_region_halland_drift_info_it_avslutad() {

		// Preparerar array för att hämta ut driftstörningar
		$args = array( 
			'numberposts'	=> -1,
			'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
	            'relation'		=> 'AND',
	            array(
	            	'key' => 'name_1000022', 
	                'value' => '3', 
	                'compare' => 'LIKE'
	            ),
	            array(
	            	'key' => 'name_1000025', 
	                'value' => '"1"', 
	                'compare' => 'LIKE'
	            ),
	        )
		);

		// Hämta valda driftstörningar
		$pages = get_posts($args);
		
		// Loopa igenom valda driftstörningar
		foreach ($pages as $page) {

			// Hämta diverse olika ACF-objekt
			$field_start_time	= get_field_object('field_1000017', $page->ID);
			$field_end_time		= get_field_object('field_1000019', $page->ID);
			$field_status		= get_field_object('field_1000021', $page->ID);
			$field_omrade		= get_field_object('field_1000024', $page->ID);

			// Spara ner ACF-data i page-arrayen
			$page->start_time 	= $field_start_time['value'];
			$page->end_time 	= $field_end_time['value'];
			$page->status 		= $field_status['value'];
			$page->omrade 		= $field_omrade['value'];
			
			// Lägg till sidans url 	
			$page->url 			= get_page_link($page->ID);
			
			$page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->status_name  = "Avslutad";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-red text-white";
		}

		// Returnera valda driftstörningar
		return $pages;

	}

    // *****************************************************
    // *** Hämta driftstörningar för "Telefoni - Kommande"
    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 2 (Telefoni)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mer än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
    function get_region_halland_drift_info_telefoni_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Kommande";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *************************************************
    // *** "Telefoni - Avslutad"
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 3 (Avslutad)
    // *** name_1000025 = 2 (Telefoni)
    // *** post_modified (avslutad senaste 2 timmarna)
    // *** Sorterad efter "slut_datum" med senast först
    // *****************************************************
    function get_region_halland_drift_info_telefoni_avslutad() {

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'ASC',
            'meta_query' => array(
                'relation'		=> 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->status_name  = "Avslutad";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-red text-white";
        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *****************************************************
    // *** Hämta driftstörningar för "Fastighet - Kommande"
    // *****************************************************
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 1 & 2 (Pågående & Planerad)
    // *** name_1000025 = 3 (Fastighet)
    // *** name_1000018 (datum mer än detta datum-värde)
    // *** name_1000020 (datum mer än detta datum-värde)
    // *** Sorterad efter "start_date" med senast först
    // *****************************************************
    function get_region_halland_drift_info_fastighet_kommande() {

        $date = date("Y-m-d H:i:s");

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            //$page->status_name = $field_status['choices'][get_field('name_1000022', $page->ID)];

            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->compare_date	= $date;
            $page->status_name  = "Kommande";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-orange";

        }

        // Returnera valda driftstörningar
        return $pages;

    }

    // *************************************************
    // *** "Fastighet - Avslutad"
    // *** Hämta alla driftstörningar som är:
    // *** name_1000022 = 3 (Avslutad)
    // *** name_1000025 = 3 (Telefoni)
    // *** post_modified (avslutad senaste 2 timmarna)
    // *** Sorterad efter "slut_datum" med senast först
    // *****************************************************
    function get_region_halland_drift_info_fastighet_avslutad() {

        // Preparerar array för att hämta ut driftstörningar
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'ASC',
            'meta_query' => array(
                'relation'		=> 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
            )
        );

        // Hämta valda driftstörningar
        $pages = get_posts($args);

        // Loopa igenom valda driftstörningar
        foreach ($pages as $page) {

            // Hämta diverse olika ACF-objekt
            $field_start_time	= get_field_object('field_1000017', $page->ID);
            $field_end_time		= get_field_object('field_1000019', $page->ID);
            $field_status		= get_field_object('field_1000021', $page->ID);
            $field_omrade		= get_field_object('field_1000024', $page->ID);

            // Spara ner ACF-data i page-arrayen
            $page->start_time 	= $field_start_time['value'];
            $page->end_time 	= $field_end_time['value'];
            $page->status 		= $field_status['value'];
            $page->omrade 		= $field_omrade['value'];

            // Lägg till sidans url
            $page->url 			= get_page_link($page->ID);

            $page->follow_up 	= get_field('name_1000027', $page->ID);
            $page->status_name  = "Avslutad";
            $page->status_class = "inline-flex py-1 p-3 rounded-full bg-red text-white";
        }

        // Returnera valda driftstörningar
        return $pages;

    }

	// ***********************************************
	// *** Hämta antal av respektive driftstörning ***
	// ***********************************************
	function get_region_halland_drift_info_get_numbers() {

		// Tid just nu minys två timmar
		$dateMinusTwoHours = date("Y-m-d H:i:s", time()-7200);
		
		// Just nu
		$date = date("Y-m-d H:i:s");

		// Array for numbers
		$myNumbers = array();
		
		// Pågående - IT
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
		$countPagesPagaendeIT 	= count(get_posts($args));
		
		// Pågående - Telefoni
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
        $countPagesPagaendeTelefoni = count(get_posts($args));
		
		// Pågående - Fastighet
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '<=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
		$countPagesPagaendeFastighet 		= count(get_posts($args));
		
		// Kommande - IT
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
		$countPagesKommandeIT 	= count(get_posts($args));
		
		// Kommande - Telefoni
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
		$countPagesKommandeTelefoni = count(get_posts($args));
		
		// Kommande - Fastighet
        $args = array(
            'numberposts' => -1,
            'post_type' => 'driftinfo',
            'meta_key' => 'name_1000018',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'DESC',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => array('1', '2'),
                    'compare' => 'IN'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
                array(
                    'key'		=> 'name_1000018',
                    'compare'	=> '>=',
                    'value'		=> $date,
                ),
                array(
                    'key'		=> 'name_1000020',
                    'compare'	=> '>=',
                    'value'		=> $date,
                )
            )
        );
		$countPagesKommandeFastighet 		= count(get_posts($args));
		
		// Avslutad - IT
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'ASC',
            'meta_query' => array(
                'relation'		=> 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"1"',
                    'compare' => 'LIKE'
                ),
            )
        );
		$countPagesAvslutadIT 	= count(get_posts($args));
		
		// Avslutad - Telefoni
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'ASC',
            'meta_query' => array(
                'relation'		=> 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"2"',
                    'compare' => 'LIKE'
                ),
            )
        );
		$countPagesAvslutadTelefoni = count(get_posts($args));
		
		// Avslutad - Fastighet
        $args = array(
            'numberposts'	=> -1,
            'post_type'		=> 'driftinfo',
            'meta_key' => 'name_1000020',
            'orderby' => 'meta_value meta_value_num',
            'order'	=> 'ASC',
            'meta_query' => array(
                'relation'		=> 'AND',
                array(
                    'key' => 'name_1000022',
                    'value' => '3',
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'name_1000025',
                    'value' => '"3"',
                    'compare' => 'LIKE'
                ),
            )
        );
		$countPagesAvslutadFastighet 		= count(get_posts($args));

		// Store data in array
		$myNumbers['Pagaende'] 				= $countPagesPagaendeIT+$countPagesPagaendeTelefoni+$countPagesPagaendeFastighet;
		$myNumbers['Pagaende-IT'] 			= $countPagesPagaendeIT;
		$myNumbers['Pagaende-Telefoni'] 	= $countPagesPagaendeTelefoni;
		$myNumbers['Pagaende-Fastighet'] 	= $countPagesPagaendeFastighet;
		
		$myNumbers['Kommande'] 				= $countPagesKommandeIT+$countPagesKommandeTelefoni+$countPagesKommandeFastighet;
		$myNumbers['Kommande-IT'] 			= $countPagesKommandeIT;
		$myNumbers['Kommande-Telefoni'] 	= $countPagesKommandeTelefoni;
		$myNumbers['Kommande-Fastighet'] 	= $countPagesKommandeFastighet;

		$myNumbers['Avslutad'] 				= $countPagesAvslutadIT+$countPagesAvslutadTelefoni+$countPagesAvslutadFastighet;
		$myNumbers['Avslutad-IT'] 			= $countPagesAvslutadIT;
		$myNumbers['Avslutad-Telefoni'] 	= $countPagesAvslutadTelefoni;
		$myNumbers['Avslutad-Fastighet'] 	= $countPagesAvslutadFastighet;

		
		// Return array
		return $myNumbers;	

	}

	function get_region_halland_drift_omrade_namn($id) {
		switch ($id) {
	    case 1:
	        return "IT";
	        break;
	    case 2:
	        return "Telefoni";
	        break;
	    case 3:
	        return "Fastighet";
	        break;
		} 
	}

	function get_region_halland_drift_fix_date($date) {
		return substr($date,0,16);
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