<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    
    function create_post_type() {

        register_post_type( 'coaches',

            array(
                'labels' => array(
                    'name' => __( 'Facilitators Guide' ),
                    'singular_name' => __( 'Facilitators Guide' )
                ),
                'public' => true,
                'has_archive' => true,
				'rewrite' => array('slug' => 'facilitators-guide'),         
                'supports'  => array( 'title','thumbnail','custom-fields',  'editor', 'excerpt','author'),
                'show_in_rest' => true,
                'hierarchical' => true,
                'menu_position' => 11,
                'with_front' => false,
                'menu_icon' => 'dashicons-businessman'
            )
            
        );

        register_post_type( 'students',

            array(
                'labels' => array(
                    'name' => __( 'Students Articles' ),
                    'singular_name' => __( 'Students Article' )
                ),
                'public' => true,
                'has_archive' => true,
                'supports'  => array( 'title','thumbnail','custom-fields',  'editor', 'excerpt','author'),
                'show_in_rest' => true,
                'hierarchical' => true,
                'menu_position' => 11,
                'with_front' => false,
                'menu_icon' => 'dashicons-edit-large'
            )
            
        );
        
    }
    add_action( 'init', 'create_post_type' );

 
	function be_register_taxonomies() {
	    $taxonomies = array(
	        array(
	            'slug'         => 'coaches-topic',
	            'single_name'  => 'Categories',
	            'plural_name'  => 'Categories',
	            'post_type'    => 'coaches'
	        ),
	        array(
	            'slug'         => 'students-topic',
	            'single_name'  => 'Categories',
	            'plural_name'  => 'Categories',
	            'post_type'    => 'students'
	        )
	    );
	    foreach( $taxonomies as $taxonomy ) {
	        $labels = array(
	            'name' => $taxonomy['plural_name'],
	            'singular_name' => $taxonomy['single_name'],
	            'search_items' =>  'Search ' . $taxonomy['plural_name'],
	            'all_items' => 'All ' . $taxonomy['plural_name'],
	            'parent_item' => 'Parent ' . $taxonomy['single_name'],
	            'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
	            'edit_item' => 'Edit ' . $taxonomy['single_name'],
	            'update_item' => 'Update ' . $taxonomy['single_name'],
	            'add_new_item' => 'Add New ' . $taxonomy['single_name'],
	            'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
	            'menu_name' => $taxonomy['plural_name']
	        );
	        
	        $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
	        $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
	    
	        register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
	            'hierarchical' => $hierarchical,
	            'show_in_rest' => true,
	            'labels' => $labels,
	            'show_ui' => true,
	            'query_var' => true,
	            'rewrite' => $rewrite,
	        ));
	    }
	    
	}

	add_action( 'init', 'be_register_taxonomies' );



	/*Add custom post type (coaches) permission for coaches*/
	add_filter( 'register_post_type_args', 'change_capabilities_of_coaches' , 10, 2 );

	function change_capabilities_of_coaches( $coach_args, $post_type ){

	if ( 'coaches' !== $post_type ) {

	    return $coach_args;

	}

	$coach_args['capabilities'] = array(
	    'edit_post' => 'edit_coaches',
	    'edit_posts' => 'edit_coaches',
	    'edit_others_posts' => 'edit_other_coaches',
	    'publish_posts' => 'publish_coaches',
	    'read_post' => 'read_coaches',
	    'read_private_posts' => 'read_private_coaches',
	    'delete_post' => 'delete_coaches'
	);

	return $coach_args;

	}

	add_action('admin_init','rpt_add_role_caps_coach',999); 
	add_action('admin_init','rpt_add_role_caps_admin',999); 

	function rpt_add_role_caps_coach() {

	    $role = get_role('group_leader');               
	    $role->add_cap( 'read_coaches');
	    $role->add_cap( 'edit_coaches' );
	    $role->add_cap( 'edit_coaches' );
	    $role->add_cap( 'edit_other_coaches' );
	    $role->add_cap( 'edit_published_coaches' );
	    $role->add_cap( 'publish_coaches' );
	    $role->add_cap( 'read_private_coaches' );
	    $role->add_cap( 'delete_coaches' );

	}

	function rpt_add_role_caps_admin() {

	    $role = get_role('administrator');               
	    $role->add_cap( 'read_coaches');
	    $role->add_cap( 'edit_coaches' );
	    $role->add_cap( 'edit_coaches' );
	    $role->add_cap( 'edit_other_coaches' );
	    $role->add_cap( 'edit_published_coaches' );
	    $role->add_cap( 'publish_coaches' );
	    $role->add_cap( 'read_private_coaches' );
	    $role->add_cap( 'delete_coaches' );

	}

	/*Add custom post type (students) permission for coaches*/


	add_filter( 'register_post_type_args', 'change_capabilities_of_coaches_for_students_cpt' , 10, 2 );

	function change_capabilities_of_coaches_for_students_cpt( $student_args, $post_type_students ){

	if ( 'students' !== $post_type_students ) {

	    return $student_args;

	}

	$student_args['capabilities'] = array(
	    'edit_post' => 'edit_students',
	    'edit_posts' => 'edit_students',
	    'edit_others_posts' => 'edit_other_students',
	    'publish_posts' => 'publish_students',
	    'read_post' => 'read_students',
	    'read_private_posts' => 'read_private_students',
	    'delete_post' => 'delete_students'
	);

	return $student_args;

	}

	add_action('admin_init','rpt_add_role_caps_student',999); 
	add_action('admin_init','rpt_add_role_caps_student_for_admin',999); 

	function rpt_add_role_caps_student() {

	    $role = get_role('group_leader');               
	    $role->add_cap( 'read_students');
	    $role->add_cap( 'edit_students' );
	    $role->add_cap( 'edit_students' );
	    $role->add_cap( 'edit_other_students' );
	    $role->add_cap( 'edit_published_students' );
	    $role->add_cap( 'publish_students' );
	    $role->add_cap( 'read_private_students' );
	    $role->add_cap( 'delete_students' );

	}

	function rpt_add_role_caps_student_for_admin() {

	    $role = get_role('administrator');               
	    $role->add_cap( 'read_students');
	    $role->add_cap( 'edit_students' );
	    $role->add_cap( 'edit_students' );
	    $role->add_cap( 'edit_other_students' );
	    $role->add_cap( 'edit_published_students' );
	    $role->add_cap( 'publish_students' );
	    $role->add_cap( 'read_private_students' );
	    $role->add_cap( 'delete_students' );

	}
