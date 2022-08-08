<?php
	
	add_action("after_setup_theme", function(){
		
		//enable certain wordpress features
		add_theme_support('title-tag');
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );
		//add_theme_support( 'align-wide' );
		
		//register navigation
		register_nav_menu( 'header', 'Kopfzeile' );
		register_nav_menu( 'blackhawks', 'Blackhawks' );
		register_nav_menu( 'degistration', 'Abmeldungen' );
		register_nav_menu( 'member', 'Mitgliederbereich' );
		
		//add editor style
		add_editor_style('css/editor-styles.min.css');
		add_editor_style('css/styles.min.css');
		add_editor_style('css/all.min.css');
	});
	
	add_action('init', function(){
		add_post_type_support( 'post', 'page-attributes' );
	});
	
	add_action("wp_enqueue_scripts", function(){
		//enqueue styles
		wp_enqueue_style("font-montserrat", "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&display=swap");
		wp_enqueue_style("fontawesome", get_template_directory_uri() . "/css/all.min.css");
		wp_enqueue_style("glightbox-css", get_template_directory_uri() . "/css/glightbox.min.css");
		wp_enqueue_style("glider-css", get_template_directory_uri() . "/css/glider.min.css");
		wp_enqueue_style("main-css", get_template_directory_uri() . "/css/styles.min.css", array("font-montserrat"), "1.4.8");
		
		//enqueue scripts
		wp_enqueue_script("glightbox-js", get_template_directory_uri() . "/js/glightbox.min.js", array(), "1.1", true);
		wp_enqueue_script("lazyload-js", get_template_directory_uri() . "/js/lazyload.min.js", array(), "17.3", true);
		wp_enqueue_script("glider-js", get_template_directory_uri() . "/js/glider.min.js", array(), "1.7.4", true);
		wp_enqueue_script("ec-emmen", get_template_directory_uri() . "/js/ec-emmen.min.js", array('glightbox-js', 'glider-js', 'lazyload-js'), "1.0.3", true);
	});
	
	add_filter("block_categories", function($categories, $post){
		return array_merge(
			array(
				array(
					'slug' => 'content-blocks',
					'title' => 'Inhalt',
				),
			),
			$categories
		);
	}, 10, 2);
	
	function get_styled_title($title){
		$words = explode(" ", $title);
		
		$output = array();
		
		foreach($words as $word){
			$word = html_entity_decode($word);
			
			$first = substr($word, 0, 1);
			$rest = substr($word, 1);
			
			if($rest === ""){
				$output[] = "<span>" . htmlentities($word) . "</span>";
			}else{
				$output[] = "<span><span class='text-red'>" . htmlentities($first) . "</span>" . htmlentities($rest) . "</span>";
			}
		}
		
		return implode(" ", $output);
	}
	
	
	class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	 
	    /**
	     * Starts the list before the elements are added.
	     *
	     * Adds classes to the unordered list sub-menus.
	     *
	     * @param string $output Passed by reference. Used to append additional content.
	     * @param int    $depth  Depth of menu item. Used for padding.
	     * @param array  $args   An array of arguments. @see wp_nav_menu()
	     */
	    function start_lvl( &$output, $depth = 0, $args = array() ) {
	        // Depth-dependent classes.
	        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	        $classes = array(
	            'sub-menu',
	            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	            'menu-depth-' . $display_depth
	        );
	        $class_names = implode( ' ', $classes );
	 
	        // Build HTML for output.
	        $output .= "\n" . $indent .
	        '<div class="hidden absolute z-20 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2 ' . $class_names . '">' . 
	        	'<div class="shadow-lg">' .
	        		'<div class="shadow-xs overflow-hidden">' .
	        			'<div class="relative grid gap-5 bg-black text-white p-5">' .
	        "\n";
	    }
	    
	    /**
	     * Ends the list of after the elements are added.
	     *
	     * @param string   $output Used to append additional content (passed by reference).
	     * @param int      $depth  Depth of menu item. Used for padding.
	     * @param stdClass $args   An object of wp_nav_menu() arguments.
	     */
	    public function end_lvl( &$output, $depth = 0, $args = null ) {
	        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	            $t = '';
	            $n = '';
	        } else {
	            $t = "\t";
	            $n = "\n";
	        }
	        $indent  = str_repeat( $t, $depth );
	        $output .= "$indent</div></div></div></div>{$n}";
	    }
	 
	    /**
	     * Start the element output.
	     *
	     * Adds main/sub-classes to the list items and links.
	     *
	     * @param string $output Passed by reference. Used to append additional content.
	     * @param object $item   Menu item data object.
	     * @param int    $depth  Depth of menu item. Used for padding.
	     * @param array  $args   An array of arguments. @see wp_nav_menu()
	     * @param int    $id     Current item ID.
	     */
	    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	        global $wp_query;
	        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	 
	        // Depth-dependent classes.
	        $depth_classes = array(
	            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	            'menu-item-depth-' . $depth
	        );
	        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	 
	        // Passed classes.
	        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	        $class_name_array = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item);
	        
	        if(in_array("current_page_item", $class_name_array)){
		        $class_name_array[] = "text-red";
	        }
	        
	        $class_names = esc_attr( implode( ' ', $class_name_array ) );
	 
	        // Build HTML.
	        $output .= $indent . '<div id="nav-menu-item-'. $item->ID . '" class="relative ' . $depth_class_names . ' ' . $class_names . '">';
	        
	        $output .= '<div class="inline-flex items-center">';
	 
	        // Link attributes.
	        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	        $attributes .= ! empty( $item->url ) && !($args->walker->has_children)        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	        $attributes .= ' class="menu-link uppercase font-black hover:text-red transition duration-300 ease-in-out ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	 
	        // Build HTML output and pass through the proper filter.
	        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s%7$s',
	            $args->before,
	            $attributes,
	            $args->link_before,
	            apply_filters( 'the_title', $item->title, $item->ID ),
	            $args->link_after,
	            $args->after,
	            $args->walker->has_children ?
	            	'<svg class="text-black hover:text-red cursor-pointer transition duration-300 ease-in-out h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">' .
	            		'<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />' .
					'</svg>'
					: ""
	        );
	        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	        
	        $output .= "</div>";
	    }
	    
	    /**
	     * Ends the element output, if needed.
	     *
	     * @param string   $output Used to append additional content (passed by reference).
	     * @param WP_Post  $item   Page data object. Not used.
	     * @param int      $depth  Depth of page. Not Used.
	     * @param stdClass $args   An object of wp_nav_menu() arguments.
	     */
	    public function end_el( &$output, $item, $depth = 0, $args = null ) {
	        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	            $t = '';
	            $n = '';
	        } else {
	            $t = "\t";
	            $n = "\n";
	        }
	        $output .= "</div>{$n}";
	    }
	}
	
	class Custom_Walker_Mobile_Nav_Menu extends Walker_Nav_Menu {
	 
	    /**
	     * Starts the list before the elements are added.
	     *
	     * Adds classes to the unordered list sub-menus.
	     *
	     * @param string $output Passed by reference. Used to append additional content.
	     * @param int    $depth  Depth of menu item. Used for padding.
	     * @param array  $args   An array of arguments. @see wp_nav_menu()
	     */
	    function start_lvl( &$output, $depth = 0, $args = array() ) {
	        // Depth-dependent classes.
	        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
	        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
	        $classes = array(
		        'hidden',
	            'sub-menu',
	            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
	            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
	            'menu-depth-' . $display_depth
	        );
	        $class_names = implode( ' ', $classes );
	 
	        // Build HTML for output.
	        $output .= "\n" . $indent .
	        '<div class="text-base ' . $class_names . '">' . 
	        "\n";
	    }
	    
	    /**
	     * Ends the list of after the elements are added.
	     *
	     * @param string   $output Used to append additional content (passed by reference).
	     * @param int      $depth  Depth of menu item. Used for padding.
	     * @param stdClass $args   An object of wp_nav_menu() arguments.
	     */
	    public function end_lvl( &$output, $depth = 0, $args = null ) {
	        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	            $t = '';
	            $n = '';
	        } else {
	            $t = "\t";
	            $n = "\n";
	        }
	        $indent  = str_repeat( $t, $depth );
	        $output .= "$indent</div>{$n}";
	    }
	 
	    /**
	     * Start the element output.
	     *
	     * Adds main/sub-classes to the list items and links.
	     *
	     * @param string $output Passed by reference. Used to append additional content.
	     * @param object $item   Menu item data object.
	     * @param int    $depth  Depth of menu item. Used for padding.
	     * @param array  $args   An array of arguments. @see wp_nav_menu()
	     * @param int    $id     Current item ID.
	     */
	    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
	        global $wp_query;
	        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
	 
	        // Depth-dependent classes.
	        $depth_classes = array(
	            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
	            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
	            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
	            'menu-item-depth-' . $depth
	        );
	        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
	 
	        // Passed classes.
	        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	        $class_name_array = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item);
	        
	        if(in_array("current_page_item", $class_name_array)){
		        $class_name_array[] = "text-red";
	        }
	        
	        if($args->walker->has_children){
		        $class_name_array[] = "toggle-submenu";
	        }
	        
	        $class_names = esc_attr( implode( ' ', $class_name_array ) );
	 
	        // Build HTML.
	        $output .= $indent . '<div id="nav-menu-item-'. $item->ID . '" class="relative ' . $depth_class_names . ' ' . $class_names . '">';
	        
	        $output .= '<div class="link inline-flex items-center mb-4">';
	 
	        // Link attributes.
	        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	        $attributes .= ! empty( $item->url ) && !($args->walker->has_children)        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
	        $attributes .= ' class="menu-link inline-block relative uppercase font-black hover:text-red transition duration-300 ease-in-out ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
	 
	        // Build HTML output and pass through the proper filter.
	        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s%6$s</a>%7$s',
	            $args->before,
	            $attributes,
	            $args->link_before,
	            apply_filters( 'the_title', $item->title, $item->ID ),
	            $args->link_after,
	            $args->walker->has_children ?
	            	'<svg class="triangle absolute top-0 text-red cursor-pointer transition duration-300 ease-in-out h-10 w-10 transform" style="right: -2.5rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">' .
	            		'<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />' .
					'</svg>'
					: "",
				$args->after
	        );
	        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	        
	        $output .= "</div>";
	    }
	    
	    /**
	     * Ends the element output, if needed.
	     *
	     * @param string   $output Used to append additional content (passed by reference).
	     * @param WP_Post  $item   Page data object. Not used.
	     * @param int      $depth  Depth of page. Not Used.
	     * @param stdClass $args   An object of wp_nav_menu() arguments.
	     */
	    public function end_el( &$output, $item, $depth = 0, $args = null ) {
	        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
	            $t = '';
	            $n = '';
	        } else {
	            $t = "\t";
	            $n = "\n";
	        }
	        $output .= "</div>{$n}";
	    }
	}
	
	
	add_filter("render_block", function($content, $block){
		if(strpos($block["blockName"], "acf/") === false){
			//if not a custom block, wrap in container
			return '<div class="container mx-auto">' . $content . '</div>';
		}
		
		return $content;
	}, 100, 2);
	
	add_action("init", function(){
		$labels = array(
			'name'                  => 'Events',
			'singular_name'         => 'Event',
			'menu_name'             => 'Events',
			'name_admin_bar'        => 'Event',
			'archives'              => 'Event Archive',
			'attributes'            => 'Event Attribute',
			'parent_item_colon'     => 'Übergeordnets Event',
			'all_items'             => 'Alle',
			'add_new_item'          => 'Neuen Event',
			'add_new'               => 'Neuen Event',
			'new_item'              => 'Neuen Event',
			'edit_item'             => 'Event bearbeiten',
			'update_item'           => 'Event aktualisieren',
			'view_item'             => 'Event ansehen',
			'view_items'            => 'Events ansehen',
			'search_items'          => 'Event suchen',
			'not_found'             => 'Nicht gefunden',
			'not_found_in_trash'    => 'Nicht im Papierkorb gefunden',
			'featured_image'        => 'Vorschaubild',
			'set_featured_image'    => 'Vorschaubild festlegen',
			'remove_featured_image' => 'Vorschaubild entfernen',
			'use_featured_image'    => 'Als Vorschaubild verwenden',
			'insert_into_item'      => 'Event einfügen in',
			'uploaded_to_this_item' => 'Zu diesem Event hochgeladen',
			'items_list'            => 'Eventliste',
			'items_list_navigation' => 'Navigation Eventliste',
			'filter_items_list'     => 'Eventliste filtern',
		);
		$args = array(
			'label'                 => 'Event',
			'description'           => 'Einträge im Jahreskalender',
			'labels'                => $labels,
			'supports'              => array( 'title' ),
			'taxonomies'            => array(),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-calendar',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'event', $args );
	});
	
	add_filter("allowed_block_types", function($allowed_blocks, $post){
		if(!is_array($allowed_blocks)){
			$allowed_blocks = array(
				'core/paragraph',
				'core/image',
				'acf/agenda',
				'acf/title',
				'acf/ec-emmen-title',
				'acf/hero-image',
				'acf/hero-slider',
				'acf/hero-video',
				'acf/selected-posts',
				'acf/sponsors',
				'acf/calendar',
				'acf/activities',
				'acf/image-text',
				'acf/person',
				'acf/training-table',
				'acf/shop-recommendation',
				'acf/email',
				'acf/unicycle',
				'acf/gallery',
				'acf/gallery-link-download',
				'contact-form-7/contact-form-selector',
				'acf/registrations',
				'acf/login',
				'acf/file',
				'acf/spacer',
				'acf/video',
				'acf/youtube',
				'acf/text-blocks',
				'acf/iframe',
			);
		}
		
		return array_filter($allowed_blocks, function($name){
			
			//disable certain blocks
			if(in_array($name, array("core/heading"))){
				return false;
			}
			
			return true;
		});
	}, 10, 2);
	
	add_action('acf/init', function(){
		// Check function exists.
		
		if( function_exists('acf_add_options_page') ) {
	
			acf_add_options_page(array(
				'page_title' 	=> 'Design Einstelungen',
				'menu_title'	=> 'Design Einstelungen',
				'menu_slug' 	=> 'theme-general-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> true
			));
			
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Beitragsseite Einstellungen',
				'menu_title'	=> 'Beitragsseite',
				'parent_slug'	=> 'theme-general-settings',
			));
			
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Mitgliederbereich',
				'menu_title'	=> 'Mitgliederbereich',
				'parent_slug'	=> 'theme-general-settings',
			));
			
			acf_add_options_sub_page(array(
				'page_title' 	=> 'Fusszeile Einstellungen',
				'menu_title'	=> 'Fusszeile',
				'parent_slug'	=> 'theme-general-settings',
			));
			
		}
		
	    if( function_exists('acf_register_block_type') ) {
	
	        acf_register_block_type(array(
	            'name'              => 'agenda',
	            'title'             => 'Agenda',
	            'description'       => 'Zeige die letzten zwei Einträge an',
	            'render_template'   => 'template-parts/blocks/agenda/agenda.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'calendar',
	            'keywords'          => array( 'agenda', 'termine', 'kalender' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'title',
	            'title'             => 'Überschrift',
	            'description'       => 'Eine Überschrift',
	            'render_template'   => 'template-parts/blocks/title/title.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'heading',
	            'keywords'          => array( 'überschrift', 'titel' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'image-text',
	            'title'             => 'Bild mit Text',
	            'description'       => 'Bild mit Verlauf und Text',
	            'render_template'   => 'template-parts/blocks/image-text/image-text.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'format-image',
	            'keywords'          => array( 'text', 'bild' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'ec-emmen-title',
	            'title'             => 'EC Emmen Überschrift',
	            'description'       => 'Färbe die ersten Buchstaben rot',
	            'render_template'   => 'template-parts/blocks/ec-emmen-title/ec-emmen-title.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'heading',
	            'keywords'          => array( 'überschrift', 'titel' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'hero-image',
	            'title'             => 'Grosses Bild, diagonaler Schnitt unten',
	            'description'       => 'Bild auf die ganze Breite. Unter Seite diagonal abgeschnitten.',
	            'render_template'   => 'template-parts/blocks/hero-image-diagonal/hero-image-diagonal.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'format-image',
	            'keywords'          => array( 'hero', 'bild', 'diagonal', 'gross' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'hero-slider',
	            'title'             => 'Grosser Slider, diagonaler Schnitt unten',
	            'description'       => 'Slider auf die ganze Breite. Unter Seite diagonal abgeschnitten.',
	            'render_template'   => 'template-parts/blocks/hero-slider/hero-slider.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'slides',
	            'keywords'          => array( 'hero', 'slide', 'slider', 'diagonal', 'gross' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'hero-video',
	            'title'             => 'Grosses Video, diagonaler Schnitt unten',
	            'description'       => 'Video auf die ganze Breite. Unter Seite diagonal abgeschnitten.',
	            'render_template'   => 'template-parts/blocks/hero-video-diagonal/hero-video-diagonal.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'video-alt3',
	            'keywords'          => array( 'hero', 'video', 'film', 'diagonal', 'gross' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'selected-posts',
	            'title'             => 'News',
	            'description'       => 'Zeige einzelne Beiträge an.',
	            'render_template'   => 'template-parts/blocks/posts/posts.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'excerpt-view',
	            'keywords'          => array( 'news', 'beitrag', 'beiträge' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'sponsors',
	            'title'             => 'Sponsoren',
	            'description'       => 'Liste Sponsoren auf',
	            'render_template'   => 'template-parts/blocks/sponsors/sponsors.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'money',
	            'keywords'          => array( 'sponsor', 'geld' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'calendar',
	            'title'             => 'Kalender',
	            'description'       => 'Liste alle (anstehenden) Anlässe auf',
	            'render_template'   => 'template-parts/blocks/calendar/calendar.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'calendar',
	            'keywords'          => array( 'kalender', 'jahreskalender', 'event' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'activities',
	            'title'             => 'Angebote',
	            'description'       => 'Liste Angebote auf',
	            'render_template'   => 'template-parts/blocks/activities/activities.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'groups',
	            'keywords'          => array( 'aktivität', 'angebot' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'person',
	            'title'             => 'Person',
	            'description'       => 'Stelle eine Person dar',
	            'render_template'   => 'template-parts/blocks/person/person.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'groups',
	            'keywords'          => array( 'person' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'unicycle',
	            'title'             => 'Einrad',
	            'description'       => 'zeige ein Einrad dar',
	            'render_template'   => 'template-parts/blocks/unicycle/unicycle.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'money',
	            'keywords'          => array( 'einrad' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'training-table',
	            'title'             => 'Trainings Tabelle',
	            'description'       => 'Stelle eine Tabelle für zB Trainingszeiten dar',
	            'render_template'   => 'template-parts/blocks/training-table/training-table.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'editor-table',
	            'keywords'          => array( 'tabelle', 'training' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'shop-recommendation',
	            'title'             => 'Shop Empfehlung',
	            'description'       => 'Empfehle den Einkauf an bestimmten Orten',
	            'render_template'   => 'template-parts/blocks/shop-recommendation/shop-recommendation.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'money',
	            'keywords'          => array( 'shop', 'empfehlung' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'email',
	            'title'             => 'E-Mail',
	            'description'       => 'Zeige ein E-Mail',
	            'render_template'   => 'template-parts/blocks/email/email.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'email',
	            'keywords'          => array( 'email' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'gallery',
	            'title'             => 'Gallerie',
	            'description'       => 'Zeige eine Gallerie',
	            'render_template'   => 'template-parts/blocks/gallery/gallery.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'format-gallery',
	            'keywords'          => array( 'gallerie' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'deregistrations',
	            'title'             => 'Abmeldungen',
	            'description'       => 'Zeige alle Abmeldungen',
	            'render_template'   => 'template-parts/blocks/deregistrations/deregistrations.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'groups',
	            'keywords'          => array( 'abmeldungen' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'login',
	            'title'             => 'Login',
	            'description'       => 'Zeige alle Abmeldungen',
	            'render_template'   => 'template-parts/blocks/login/login.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'groups',
	            'keywords'          => array( 'abmeldungen' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'file',
	            'title'             => 'Datei Download',
	            'description'       => 'Zeige einen Download',
	            'render_template'   => 'template-parts/blocks/file/file.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'download',
	            'keywords'          => array( 'datei', 'download' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'gallery-link-download',
	            'title'             => 'Gallerie Link & Download',
	            'description'       => 'Zeige einen Link zu einer Gallerie-Seite',
	            'render_template'   => 'template-parts/blocks/gallery-link/gallery-link.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'download',
	            'keywords'          => array( 'gallerie', 'link', 'ordner', 'download' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'spacer',
	            'title'             => 'Abstand / Spacer',
	            'description'       => 'Füge ein Abstand ein',
	            'render_template'   => 'template-parts/blocks/spacer/spacer.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'align-wide',
	            'keywords'          => array( 'abstand', 'spacer' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'video',
	            'title'             => 'Video',
	            'description'       => 'Füge ein Video ein',
	            'render_template'   => 'template-parts/blocks/video/video.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'format-video',
	            'keywords'          => array( 'video', 'movie', 'film' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'youtube',
	            'title'             => 'Youtube Video',
	            'description'       => 'Füge ein Youtube Video ein',
	            'render_template'   => 'template-parts/blocks/youtube/youtube.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'format-video',
	            'keywords'          => array( 'video', 'movie', 'film', 'yt', 'youtube' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'text-blocks',
	            'title'             => 'Textblöcke',
	            'description'       => 'Füge mehrere Texte nebeneinander ein',
	            'render_template'   => 'template-parts/blocks/text-blocks/text-blocks.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'text',
	            'keywords'          => array( 'text', 'block', 'horizontal', 'tabelle', 'mehrere' ),
	        ));
	        
	        acf_register_block_type(array(
	            'name'              => 'iframe',
	            'title'             => 'Iframe',
	            'description'       => 'Füge eine Website ein',
	            'render_template'   => 'template-parts/blocks/iframe/iframe.php',
	            'category'          => 'content-blocks',
	            'icon'              => 'admin-site-alt3',
	            'keywords'          => array( 'iframe', 'website' ),
	        ));
	    }
	});
	
	add_filter('login_redirect', function($redirect_to, $request, $user){
		if(!is_wp_error($user)){
			//return (is_array($user->roles) && in_array( 'administrator', $user->roles)) ? admin_url() : get_field("member-area-redirect-url", "option");
			return get_field("member-area-redirect-url", "option");
		}else{
			return admin_url();
		}
	}, 10, 3 );
	
	add_action("admin_init", function(){
		if(is_admin() && !current_user_can( 'manage_options' )){
			exit( wp_redirect(get_field("member-area-redirect-url", "option"), 302 ) );	
		}
	});
	
	add_action("after_setup_theme", function(){
		if(!is_admin() && !current_user_can( 'manage_options' )){
			show_admin_bar(false);
		}
	});
	
	add_action( 'login_form_bottom', 'add_lost_password_link' );
	function add_lost_password_link() {
		return '<a class="text-red underline" href="/wp-login.php?action=lostpassword">Passwort vergessen?</a>';
	}
	
	add_action( 'rest_api_init', function(){
	  register_rest_route( 'ec-emmen', '/download/(?P<ids>(\d+,)*\d+)', array(
	    'methods' => 'GET',
	    'callback' => function(WP_REST_Request $request){
			$parameters = $request->get_params();
			$ids = array_map("intval", explode(",", $parameters["ids"]));
			$paths = array_map("get_attached_file", $ids);
			
			/*$posts = (
				new WP_Query(
					array(
						"post_type" => "attachment",
						"post__in" => array_map("intval", $ids),
						"posts_per_page" => -1,
						"post_status" => "any"
					)
				)
			)->posts;*/
			
			$tmp_file = tempnam(get_temp_dir(), "zip");
			
			$zip = new ZipArchive;
		    if ($zip->open($tmp_file,  ZipArchive::CREATE)) {
			    foreach($paths as $path){
				    if(empty($path)){
					    echo "Invalid attachment";
					    unlink($tmp_file);
					    return;
				    }
				    $zip->addFile($path, basename($path));
			    }
		        $zip->close();
		        
		        header('Content-disposition: attachment; filename=bilder.zip');
		        header('Content-type: application/zip');
		        readfile($tmp_file);
		        
		        unlink($tmp_file);
		   } else {
		       echo 'Failed!';
		   }
	    },
	  ));
	});
	
?>