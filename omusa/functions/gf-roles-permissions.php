<?php

    // Allow editors to access Gravity Forms
    function wd_gravity_forms_roles() {

        $role = get_role( 'editor' );

        $role->add_cap( 'gform_full_access' );

    }

    add_action( 'admin_init', 'wd_gravity_forms_roles' );