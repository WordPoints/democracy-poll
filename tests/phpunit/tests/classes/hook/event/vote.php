<?php

/**
 * Test case for the Vote hook event.
 *
 * @package WordPoints\PHPUnit\Tests
 * @since 1.0.0
 */

/**
 * Tests the Vote hook event.
 *
 * @since 1.0.0
 *
 * @covers WordPoints_Democracy_Poll_Hook_Event_Vote
 */
class WordPoints_Democracy_Poll_Hook_Event_Vote_Test extends WordPoints_PHPUnit_TestCase_Hook_Event {

	/**
	 * @since 1.0.0
	 */
	protected $event_class = 'WordPoints_Democracy_Poll_Hook_Event_Vote';

	/**
	 * @since 1.0.0
	 */
	protected $event_slug = 'democracy_poll_vote';

	/**
	 * @since 1.0.0
	 */
	protected $expected_targets = array(
		array( 'current:user' ),
	);

	/**
	 * @since 1.0.0
	 */
	protected function fire_event( $arg, $reactor_slug ) {

		global $wpdb;

		$user_id = $this->factory->user->create();

		wp_set_current_user( $user_id );

		add_action( 'wp_redirect', array( $this, 'throw_exception' ) );

		// Back-compat with pre 5.4.2.
		if ( class_exists( 'Democracy_Poll' ) ) {
			$class = 'Democracy_Poll';
			$admin_class = 'Democracy_Poll_Admin';
		} else {
			$class = 'Dem';
			$admin_class = '\DemAdminInit';
		}

		// Prevent the Dem_Tinymce class from being loaded a second time with
		// require. This was fixed in 5.3.6.
		$admin_class::$opt['tinymce_button'] = false;

		try {

			$dem_admin = new $admin_class();
			$dem_admin->insert_poll(
				array(
					'question' => 'Is this a test?',
					'new_answers' => 'Yes!',
					'revote' => 1,
				)
			);

		} catch ( WordPoints_PHPUnit_Exception $e ) {
			unset( $e );
		}

		$poll_id = $wpdb->get_var(
			"
				SELECT id 
				FROM $wpdb->democracy_q 
				WHERE open = 1 
				ORDER BY id DESC LIMIT 1
			"
		);

		$_POST['dem_act'] = 'vote';
		$_POST['dem_pid'] = $poll_id;
		$_POST['answer_ids'] = '1';

		add_action( 'wp_die_handler', array( $this, 'throw_exception' ) );

		ob_start();

		try {

			@$class::init()->ajax_request_handler(); // @codingStandardsIgnoreLine

		} catch ( WordPoints_PHPUnit_Exception $e ) {
			unset( $e );
		}

		ob_end_clean();

		return array( 'current:user' => $user_id );
	}

	/**
	 * @since 1.0.0
	 */
	protected function reverse_event( $arg_id, $index ) {

		$_POST['dem_act'] = 'delVoted';

		ob_start();

		try {

			// Back-compat with pre 5.4.2.
			if ( class_exists( 'Democracy_Poll' ) ) {
				@Democracy_Poll::init()->ajax_request_handler(); // @codingStandardsIgnoreLine
			} else {
				@Dem::init()->ajax_request_handler(); // @codingStandardsIgnoreLine
			}

		} catch ( WordPoints_PHPUnit_Exception $e ) {
			unset( $e );
		}

		ob_end_clean();
	}
}

// EOF
