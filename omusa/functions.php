<?php
	/**
	 * Virtuous Core
	 *
	 *
	 * @package Virtuous
	 * @since 1.0.0
	 */
	require 'virtuous/autoload.php';

	use VirtuousConnector\vo\VirtuousContactVO;
	use VirtuousConnector\vo\VirtuousContactMethodVO;
	use VirtuousConnector\vo\VirtuousContactAddressVO;
	use VirtuousConnector\VirtuousAPI\VirtuousConnection;
	use VirtuousConnector\VirtuousAPI\VirtuousAPIController;

	// Tags
	//define ('V_TAG_' , '');

	// Custom Fields
	define('V_CUSTOM_FIELD_INDUSTRY', 'Industry');
	define('V_CUSTOM_FIELD_CURRENTLY', 'Currently');
	define('V_CUSTOM_FIELD_QUIZ_WINNER', 'Quiz Winner');
	define('V_CUSTOM_FIELD_FIELD_OF_STUDY', 'Field of Study');
	define('V_CUSTOM_FIELD_HEARED_ABOUT_OM', 'Heard About OM');
	define('V_CUSTOM_FIELD_LAST_PROFESSIONAL_TITLE', 'Last Professional Title');

	/**
	 * Theme Functions
	 *
	 * @since 1.0
	*/

	$includes = [
		'laravel-mix-asset.php',
		'add-meta-image-upload.php',
		'icons.php',
		'enqueue-files.php',
		'custom-post-type.php',
		'settings-page.php',
		'menu.php',
		'acf-blocks.php',
		'remove-wordpress-styles.php',
		'protected-api.php',
		'svg-format-support.php',
		'add-async-or-defer-to-scripts.php',
		'add-rel-preload-to-styles.php',
		'deregister-jquery.php',
		'like-posts.php',
		'remove-wp-json-oembed.php',
		'search-long-job.php',
		'search-short-job.php',
		'gf-roles-permissions.php',
		'gf-loading-indicator.php',
		'paginator.php',
		'search-functions.php',
		'load-more-videos.php',
		'search-internship.php',
		'search-stories.php',
		'search-virtual.php',
		'future-posts-visible.php',
		'check-date-range.php',
		'theme-support.php',
		'long-short-terms-handler.php',
        'scripts-header-footer.php'
	];

	foreach ( $includes as $include ) {

		if ( file_exists( TEMPLATEPATH . "/functions/" . $include ) ) {

			require_once( TEMPLATEPATH . "/functions/" . $include );

		}

	}

	// API Route Register
	add_filter( 'wp_is_application_passwords_available', '__return_true' );

	// Quiz <-> Virtuous Integration
	function quiz_virtuous_logic( $entry, $form ) {

		// Quiz Fields
		$q_1   = rgar($entry, '17');
		$q_2   = rgar($entry, '20');
		$q_3   = rgar($entry, '23');
		$q_6   = rgar($entry, '32');
		$q_7   = rgar($entry, '35');
		$q_8   = rgar($entry, '38');
		$currently = rgar($entry, '46');

		// Form Fields
		$first_name               = rgar($entry, '4');
		$last_name                = rgar($entry, '8');
		$email                    = rgar($entry, '11');
		$phone                    = (rgar($entry, '10')) ? rgar($entry, '10') : '';
		$heard_about              = (rgar($entry, '12')) ? rgar($entry, '12') : '';
		$field_of_study           = (rgar($entry, '14')) ? rgar($entry, '14') : '';
		$industry                 = (rgar($entry, '41')) ? rgar($entry, '41') : '';
		$last_professional_title  = (rgar($entry, '43')) ? rgar($entry, '43') : '';

		// Local Variables
		$max = 0;
		$winner = '';
		$total_points = 0;

		// Counter
		$results = array(
			'go' => 0,
			'learn' => 0,
			'intern' => 0,
			'explore' => 0,
			'support' => 0
		);

		// Question 1
		if ($q_1 >= 1 && $q_1 <= 4 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_1 >= 1 && $q_1 <= 4 && $currently == 'student') {
			$results['intern'] += 1;
		}

		// Question 2
		if ($q_2 >= 1 && $q_2 <= 3 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_2 >= 1 && $q_2 <= 3 && $currently == 'student') {
			$results['intern'] += 1;
		}

		if ($q_2 >= 4 && $q_2 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_2 >= 4 && $q_2 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_2 >= 4 && $q_2 <= 5 && $currently == 'full') || ($q_2 >= 4 && $q_2 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 3
		if ($q_3 >= 1 && $q_3 <= 3 && $currently != 'other') {
			$results['support'] += 1;
		} elseif ($q_3 >= 1 && $q_3 <= 3 && $currently == 'other') {
			$results['explore'] += 1;
		}

		if ($q_3 >= 4 && $q_3 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_3 >= 4 && $q_3 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_3 >= 4 && $q_3 <= 5 && $currently == 'full') || ($q_3 >= 4 && $q_3 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 6
		if ($q_6 >= 1 && $q_6 <= 3 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_6 >= 1 && $q_6 <= 3 && $currently == 'student') {
			$results['intern'] += 1;
		}

		if ($q_6 >= 4 && $q_6 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_6 >= 4 && $q_6 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_6 >= 4 && $q_6 <= 5 && $currently == 'full') || ($q_6 >= 4 && $q_6 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 7
		if ($q_7 >= 1 && $q_7 <= 3 && $currently != 'other') {
			$results['support'] += 1;
		} elseif ($q_7 >= 1 && $q_7 <= 3 && $currently == 'other') {
			$results['explore'] += 1;
		}

		// Question 8
		if ($q_8 >= 5 && $q_8 <= 7 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_8 >= 5 && $q_8 <= 7 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_8 >= 4 && $q_8 <= 5 && $currently == 'full') || ($q_8 >= 4 && $q_8 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Determines which is the winner
		foreach ($results as $key => $value) {
			if ($value > $max) {
				$max = $value;
				$winner = $key;
				$total_points += $value;
			}
		}

		// No points so far have been added to the results so the result will be added at this point.
		if ($total_points == 0) {
			if ($currently == 'full' || $currently == 'hunting') {
				$results['go'] += 1;
				$winner = 'go';
			} elseif ($currently == 'student') {
				$results['intern'] += 1;
				$winner = 'intern';
			} elseif ($currently == 'other') {
				$results['explore'] += 1;
				$winner = 'explore';
			}
		}

		$entry_id = $entry["id"];
		gform_update_meta($entry_id, 47, ucfirst($winner));

		/* Virtuous
		$data = array(
			'firstName'   => $first_name,
			'lastName'    => $last_name
		);

		$virtuous = new VirtuousAPIController();
		$virtuous->contact = new VirtuousContactVO($data);
		$virtuous->contact->emailContactMethod = new VirtuousContactMethodVO([
			'type'      => VirtuousContactMethodVO::TYPE_HOME_EMAIL,
			'value'     => $email,
			'isOptedIn' => true,
			'isPrimary' => true,
		]);

		$virtuous->contact->phoneContactMethod = new VirtuousContactMethodVO([
			'type'      => VirtuousContactMethodVO::TYPE_HOME_PHONE,
			'value'     => $phone,
			'isOptedIn' => true
		]);

		$contactMatches = $virtuous->findContact($email);

		if( !$contactMatches ) {

			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_INDUSTRY, $industry);
			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_QUIZ_WINNER, $winner);
			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_CURRENTLY, $currently);
			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_HEARED_ABOUT_OM, $heard_about);
			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_FIELD_OF_STUDY, $field_of_study);
			$virtuous->contact->createCustomField(V_CUSTOM_FIELD_LAST_PROFESSIONAL_TITLE, $last_professional_title);

		} else {

			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_INDUSTRY, $industry);
			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_QUIZ_WINNER, $winner);
			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_CURRENTLY, $currently);
			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_HEARED_ABOUT_OM, $heard_about);
			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_FIELD_OF_STUDY, $field_of_study);
			$virtuous->contact->updateCustomField(V_CUSTOM_FIELD_LAST_PROFESSIONAL_TITLE, $last_professional_title);

		}

		//$virtuous->contact->addTag(V_TAG_OM_QUIZ_TAG);

		$response = $virtuous->processContact();*/
	}
	add_action( 'gform_after_submission_9', 'quiz_virtuous_logic', 10, 2 );

	// Quiz Confirmation Logic
	function quiz_confirmation_results_logic( $confirmation, $form, $entry, $ajax ) {

		// Form Fields
		$q_1   = rgar($entry, '17');
		$q_2   = rgar($entry, '20');
		$q_3   = rgar($entry, '23');
		$q_6   = rgar($entry, '32');
		$q_7   = rgar($entry, '35');
		$q_8   = rgar($entry, '38');
		$currently = rgar($entry, '46');

		// Local Variables
		$max = 0;
		$winner = '';
		$total_points = 0;
		$om_logo = get_field('quiz_settings_logo', 'option');

		// Counter
		$results = array(
			'go' => 0,
			'learn' => 0,
			'intern' => 0,
			'explore' => 0,
			'support' => 0
		);

		// Question 1
		if ($q_1 >= 1 && $q_1 <= 4 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_1 >= 1 && $q_1 <= 4 && $currently == 'student') {
			$results['intern'] += 1;
		}

		// Question 2
		if ($q_2 >= 1 && $q_2 <= 3 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_2 >= 1 && $q_2 <= 3 && $currently == 'student') {
			$results['intern'] += 1;
		}

		if ($q_2 >= 4 && $q_2 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_2 >= 4 && $q_2 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_2 >= 4 && $q_2 <= 5 && $currently == 'full') || ($q_2 >= 4 && $q_2 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 3
		if ($q_3 >= 1 && $q_3 <= 3 && $currently != 'other') {
			$results['support'] += 1;
		} elseif ($q_3 >= 1 && $q_3 <= 3 && $currently == 'other') {
			$results['explore'] += 1;
		}

		if ($q_3 >= 4 && $q_3 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_3 >= 4 && $q_3 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_3 >= 4 && $q_3 <= 5 && $currently == 'full') || ($q_3 >= 4 && $q_3 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 6
		if ($q_6 >= 1 && $q_6 <= 3 && $currently != 'student') {
			$results['explore'] += 1;
		} elseif ($q_6 >= 1 && $q_6 <= 3 && $currently == 'student') {
			$results['intern'] += 1;
		}

		if ($q_6 >= 4 && $q_6 <= 5 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_6 >= 4 && $q_6 <= 5 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_6 >= 4 && $q_6 <= 5 && $currently == 'full') || ($q_6 >= 4 && $q_6 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Question 7
		if ($q_7 >= 1 && $q_7 <= 3 && $currently != 'other') {
			$results['support'] += 1;
		} elseif ($q_7 >= 1 && $q_7 <= 3 && $currently == 'other') {
			$results['explore'] += 1;
		}

		// Question 8
		if ($q_8 >= 5 && $q_8 <= 7 && $currently == 'student') {
			$results['intern'] += 1;
		} elseif ($q_8 >= 5 && $q_8 <= 7 && $currently == 'other') {
			$results['explore'] += 1;
		} elseif (($q_8 >= 4 && $q_8 <= 5 && $currently == 'full') || ($q_8 >= 4 && $q_8 <= 5 && $currently == 'hunting')) {
			$results['learn'] += 1;
		}

		// Determines which is the winner
		foreach ($results as $key => $value) {
			if ($value > $max) {
				$max = $value;
				$winner = $key;
				$total_points += $value;
			}
		}

		// No points so far have been added to the results so the result will be added at this point.
		if ($total_points == 0) {
			if ($currently == 'full' || $currently == 'hunting') {
				$results['go'] += 1;
				$winner = 'go';
			} elseif ($currently == 'student') {
				$results['intern'] += 1;
				$winner = 'intern';
			} elseif ($currently == 'other') {
				$results['explore'] += 1;
				$winner = 'explore';
			}
		}

		// Winners Section
		if ($winner == 'go') {
			$title = get_field('quiz_settings_go_title', 'option');
			$description = get_field('quiz_settings_go_description', 'option');
			$content = get_field('quiz_settings_go_content', 'option');
			$link = get_field('quiz_settings_go_link', 'option');
			$link_target = $link ? $link['target'] : '_self';

			$confirmation = '<div>'.
				'<div class="flex flex-col-reverse md:flex-row items-center mb-6">'.
					'<div class="w-full md:w-2/3">'.
						'<div class="mb-6">'.
							'<div class="text-xl font-roboto font-bold leading-none mb-2">'.
								'Your results indicate that you’re ...'.
							'</div>'.
							'<div class="text-3xl md:text-4xl font-roboto font-light leading-none">'.
								$title.
							'</div>'.
						'</div>'.
						'<div class="font-medium lg:pr-20">'.
							$description.
						'</div>'.
					'</div>'.
					'<div class="w-full md:w-1/3">'.
						'<img src="'. $om_logo .'" alt="OM Logo">'.
					'</div>'.
				'</div>'.
				'<div class="has-red-links has-wysiwyg">'.
					$content.
				'</div>'.
				'<div class="flex justify-center py-8 border-t border-b border-gray-300">'.
					'<a href="'. $link['url'] .'" target="'. esc_attr($link_target) .'" class="text-white-pure text-xl font-black leading-none px-8 py-4 bg-teal-500 inline-block">'. $link['title'] .'</a>'.
				'</div>'.
			'</div>';
		} elseif ($winner == 'learn') {
			$title = get_field('quiz_settings_learn_title', 'option');
			$description = get_field('quiz_settings_learn_description', 'option');
			$content = get_field('quiz_settings_learn_content', 'option');
			$link = get_field('quiz_settings_learn_link', 'option');
			$link_target = $link ? $link['target'] : '_self';

			$confirmation = '<div>'.
				'<div class="flex flex-col-reverse md:flex-row items-center mb-6">'.
					'<div class="w-full md:w-2/3">'.
						'<div class="mb-6">'.
							'<div class="text-xl font-roboto font-bold leading-none mb-2">'.
								'Your results indicate that you’re ...'.
							'</div>'.
							'<div class="text-3xl md:text-4xl font-roboto font-light leading-none">'.
								$title.
							'</div>'.
						'</div>'.
						'<div class="font-medium lg:pr-20">'.
							$description.
						'</div>'.
					'</div>'.
					'<div class="w-full md:w-1/3">'.
						'<img src="'. $om_logo .'" alt="OM Logo">'.
					'</div>'.
				'</div>'.
				'<div class="has-red-links has-wysiwyg">'.
					$content.
				'</div>'.
				'<div class="flex justify-center py-8 border-t border-b border-gray-300">'.
					'<a href="'. $link['url'] .'" target="'. esc_attr($link_target) .'" class="text-white-pure text-xl font-black leading-none px-8 py-4 bg-teal-500 inline-block">'. $link['title'] .'</a>'.
				'</div>'.
			'</div>';
		} elseif ($winner == 'intern') {
			$title = get_field('quiz_settings_intern_title', 'option');
			$description = get_field('quiz_settings_intern_description', 'option');
			$content = get_field('quiz_settings_intern_content', 'option');
			$link = get_field('quiz_settings_intern_link', 'option');
			$link_target = $link ? $link['target'] : '_self';

			$confirmation = '<div>'.
				'<div class="flex flex-col-reverse md:flex-row items-center mb-6">'.
					'<div class="w-full md:w-2/3">'.
						'<div class="mb-6">'.
							'<div class="text-xl font-roboto font-bold leading-none mb-2">'.
								'Your results indicate that you’re ...'.
							'</div>'.
							'<div class="text-3xl md:text-4xl font-roboto font-light leading-none">'.
								$title.
							'</div>'.
						'</div>'.
						'<div class="font-medium lg:pr-20">'.
							$description.
						'</div>'.
					'</div>'.
					'<div class="w-full md:w-1/3">'.
						'<img src="'. $om_logo .'" alt="OM Logo">'.
					'</div>'.
				'</div>'.
				'<div class="has-red-links has-wysiwyg">'.
					$content.
				'</div>'.
				'<div class="flex justify-center py-8 border-t border-b border-gray-300">'.
					'<a href="'. $link['url'] .'" target="'. esc_attr($link_target) .'" class="text-white-pure text-xl font-black leading-none px-8 py-4 bg-teal-500 inline-block">'. $link['title'] .'</a>'.
				'</div>'.
			'</div>';
		} elseif ($winner == 'explore') {
			$title = get_field('quiz_settings_explore_title', 'option');
			$description = get_field('quiz_settings_explore_description', 'option');
			$content = get_field('quiz_settings_explore_content', 'option');
			$link = get_field('quiz_settings_explore_link', 'option');
			$link_target = $link ? $link['target'] : '_self';

			$confirmation = '<div>'.
				'<div class="flex flex-col-reverse md:flex-row items-center mb-6">'.
					'<div class="w-full md:w-2/3">'.
						'<div class="mb-6">'.
							'<div class="text-xl font-roboto font-bold leading-none mb-2">'.
								'Your results indicate that you’re ...'.
							'</div>'.
							'<div class="text-3xl md:text-4xl font-roboto font-light leading-none">'.
								$title.
							'</div>'.
						'</div>'.
						'<div class="font-medium lg:pr-20">'.
							$description.
						'</div>'.
					'</div>'.
					'<div class="w-full md:w-1/3">'.
						'<img src="'. $om_logo .'" alt="OM Logo">'.
					'</div>'.
				'</div>'.
				'<div class="has-red-links has-wysiwyg">'.
					$content.
				'</div>'.
				'<div class="flex justify-center py-8 border-t border-b border-gray-300">'.
					'<a href="'. $link['url'] .'" target="'. esc_attr($link_target) .'" class="text-white-pure text-xl font-black leading-none px-8 py-4 bg-teal-500 inline-block">'. $link['title'] .'</a>'.
				'</div>'.
			'</div>';
		} elseif ($winner == 'support') {
			$title = get_field('quiz_settings_support_title', 'option');
			$description = get_field('quiz_settings_support_description', 'option');
			$content = get_field('quiz_settings_support_content', 'option');
			$link = get_field('quiz_settings_support_link', 'option');
			$link_target = $link ? $link['target'] : '_self';

			$confirmation = '<div>'.
				'<div class="flex flex-col-reverse md:flex-row items-center mb-6">'.
					'<div class="w-full md:w-2/3">'.
						'<div class="mb-6">'.
							'<div class="text-xl font-roboto font-bold leading-none mb-2">'.
								'Your results indicate that you’re ...'.
							'</div>'.
							'<div class="text-3xl md:text-4xl font-roboto font-light leading-none">'.
								$title.
							'</div>'.
						'</div>'.
						'<div class="font-medium lg:pr-20">'.
							$description.
						'</div>'.
					'</div>'.
					'<div class="w-full md:w-1/3">'.
						'<img src="'. $om_logo .'" alt="OM Logo">'.
					'</div>'.
				'</div>'.
				'<div class="has-red-links has-wysiwyg">'.
					$content.
				'</div>'.
				'<div class="flex justify-center py-8 border-t border-b border-gray-300">'.
					'<a href="'. $link['url'] .'" target="'. esc_attr($link_target) .'" class="text-white-pure text-xl font-black leading-none px-8 py-4 bg-teal-500 inline-block">'. $link['title'] .'</a>'.
				'</div>'.
			'</div>';
		}

		return $confirmation;
	}
	add_action( 'gform_confirmation_9', 'quiz_confirmation_results_logic', 10, 4 );

	// Quiz Email logic
	function quiz_email_logic( $email, $message_format, $notification, $entry ) {

		$site_url = network_site_url('/');
		$theme_directory = get_template_directory();
		$form = $entry['form_id'];
		$server_year = date('Y'); // Get server year to update email-template year.


		if ($form == 9) {

			// Form Fields
			$q_1   = rgar($entry, '17');
			$q_2   = rgar($entry, '20');
			$q_3   = rgar($entry, '23');
			$q_6   = rgar($entry, '32');
			$q_7   = rgar($entry, '35');
			$q_8   = rgar($entry, '38');
			$currently = rgar($entry, '46');

			// Form Fields
			$first_name  = rgar($entry, '4');
			$user_email  = rgar($entry, '11');

			// Local Variables
			$max = 0;
			$winner = '';
			$total_points = 0;
			$link = '';

			// Counter
			$results = array(
				'go' => 0,
				'learn' => 0,
				'intern' => 0,
				'explore' => 0,
				'support' => 0
			);

			// Question 1
			if ($q_1 >= 1 && $q_1 <= 4 && $currently != 'student') {
				$results['explore'] += 1;
			} elseif ($q_1 >= 1 && $q_1 <= 4 && $currently == 'student') {
				$results['intern'] += 1;
			}

			// Question 2
			if ($q_2 >= 1 && $q_2 <= 3 && $currently != 'student') {
				$results['explore'] += 1;
			} elseif ($q_2 >= 1 && $q_2 <= 3 && $currently == 'student') {
				$results['intern'] += 1;
			}

			if ($q_2 >= 4 && $q_2 <= 5 && $currently == 'student') {
				$results['intern'] += 1;
			} elseif ($q_2 >= 4 && $q_2 <= 5 && $currently == 'other') {
				$results['explore'] += 1;
			} elseif (($q_2 >= 4 && $q_2 <= 5 && $currently == 'full') || ($q_2 >= 4 && $q_2 <= 5 && $currently == 'hunting')) {
				$results['learn'] += 1;
			}

			// Question 3
			if ($q_3 >= 1 && $q_3 <= 3 && $currently != 'other') {
				$results['support'] += 1;
			} elseif ($q_3 >= 1 && $q_3 <= 3 && $currently == 'other') {
				$results['explore'] += 1;
			}

			if ($q_3 >= 4 && $q_3 <= 5 && $currently == 'student') {
				$results['intern'] += 1;
			} elseif ($q_3 >= 4 && $q_3 <= 5 && $currently == 'other') {
				$results['explore'] += 1;
			} elseif (($q_3 >= 4 && $q_3 <= 5 && $currently == 'full') || ($q_3 >= 4 && $q_3 <= 5 && $currently == 'hunting')) {
				$results['learn'] += 1;
			}

			// Question 6
			if ($q_6 >= 1 && $q_6 <= 3 && $currently != 'student') {
				$results['explore'] += 1;
			} elseif ($q_6 >= 1 && $q_6 <= 3 && $currently == 'student') {
				$results['intern'] += 1;
			}

			if ($q_6 >= 4 && $q_6 <= 5 && $currently == 'student') {
				$results['intern'] += 1;
			} elseif ($q_6 >= 4 && $q_6 <= 5 && $currently == 'other') {
				$results['explore'] += 1;
			} elseif (($q_6 >= 4 && $q_6 <= 5 && $currently == 'full') || ($q_6 >= 4 && $q_6 <= 5 && $currently == 'hunting')) {
				$results['learn'] += 1;
			}

			// Question 7
			if ($q_7 >= 1 && $q_7 <= 3 && $currently != 'other') {
				$results['support'] += 1;
			} elseif ($q_7 >= 1 && $q_7 <= 3 && $currently == 'other') {
				$results['explore'] += 1;
			}

			// Question 8
			if ($q_8 >= 5 && $q_8 <= 7 && $currently == 'student') {
				$results['intern'] += 1;
			} elseif ($q_8 >= 5 && $q_8 <= 7 && $currently == 'other') {
				$results['explore'] += 1;
			} elseif (($q_8 >= 4 && $q_8 <= 5 && $currently == 'full') || ($q_8 >= 4 && $q_8 <= 5 && $currently == 'hunting')) {
				$results['learn'] += 1;
			}

			// Determines which is the winner
			foreach ($results as $key => $value) {
				if ($value > $max) {
					$max = $value;
					$winner = $key;
					$total_points += $value;
				}
			}

			// No points so far have been added to the results so the result will be added at this point.
			if ($total_points == 0) {
				if ($currently == 'full' || $currently == 'hunting') {
					$results['go'] += 1;
					$winner = 'go';
				} elseif ($currently == 'student') {
					$results['intern'] += 1;
					$winner = 'intern';
				} elseif ($currently == 'other') {
					$results['explore'] += 1;
					$winner = 'explore';
				}
			}

			$email['to'] = $user_email;

			// Winners Section
			if ($winner == 'go') {
				$email['subject'] = 'Quiz Results: OM can help you get ready to GO!';
				$link = get_field('quiz_settings_go_link', 'option');
			} elseif ($winner == 'learn') {
				$email['subject'] = 'Quiz Results: OM can help you learn about opportunities overseas.';
				$link = get_field('quiz_settings_learn_link', 'option');
			} elseif ($winner == 'intern') {
				$email['subject'] = 'OM can help you explore an experience outside your comfort zone.';
				$link = get_field('quiz_settings_intern_link', 'option');
			} elseif ($winner == 'explore') {
				$email['subject'] = 'OM can help you explore an experience outside your comfort zone.';
				$link = get_field('quiz_settings_explore_link', 'option');
			} elseif ($winner == 'support') {
				$email['subject'] = 'Quiz Results: See how you can work with OM.';
				$link = get_field('quiz_settings_support_link', 'option');
			}

			if (file_exists($theme_directory . '/templates/emails/' . $winner . '.html')) {
				$email_template = file_get_contents($theme_directory . '/templates/emails/' . $winner . '.html');
				$parts_to_mod = array('{{ name }}', '{{ link }}','{{ year }}');
				$replace_with = array($first_name, $link['url'], $server_year);

				for ($i=0; $i < count($parts_to_mod); $i++) {
					$email_template = str_replace($parts_to_mod[$i], $replace_with[$i], $email_template);
				}
			}

			$email['message'] = '<html>' . $email_template . '</html>';
		}

		return $email;
	}
	add_filter( 'gform_pre_send_email', 'quiz_email_logic', 10, 4 );

	// Contact Confirmation Logic
	function contact_confirmation_message( $confirmation, $form, $entry, $ajax ) {

		$om_logo = get_field('quiz_settings_logo', 'option');

		$confirmation = '<div class="text-center px-8 py-16 md:py-32 bg-white-pure rounded-md shadow-2xl mb-8 md:mb-0">'.
			'<div class="mb-8">'.
				'<img src="'. $om_logo .'" alt="OM Logo" class="inline-block">'.
			'</div>'.
			'<div class="text-red-500 text-3xl md:text-4xl font-roboto font-light leading-none mb-2">'.
				'Thanks for contacting us!'.
			'</div>'.
			'<div class="text-xl font-medium">'.
				'We will get in touch with you shortly.'.
			'</div>'.
		'</div>';

		return $confirmation;
	}
	add_action( 'gform_confirmation_3', 'contact_confirmation_message', 10, 4 );

	// Pray Confirmation Logic
	function request_pray_confirmation( $confirmation, $form, $entry, $ajax ) {

		$om_logo = get_field( 'quiz_settings_logo', 'option' );

		$confirmation = '<div class="text-center px-8 py-16 md:py-24 bg-white-pure rounded-md shadow-2xl mb-8 md:mb-0">'.
			'<div class="mb-8">'.
				'<img src="'. $om_logo .'" alt="OM Logo" class="inline-block">'.
			'</div>'.
			'<div class="text-red-500 text-3xl font-roboto font-light leading-none mb-2">'.
				'Thank you for sending your Prayer Request.'.
			'</div>'.
			'<div class="text-lg font-medium">'.
				'It’s a privilege for us to come before the Lord on your behalf, especially in times of great need.'.
			'</div>'.
		'</div>';

		return $confirmation;

	}
	add_action( 'gform_confirmation_4', 'request_pray_confirmation', 10, 4 );
