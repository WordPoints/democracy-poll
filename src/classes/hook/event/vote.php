<?php

/**
 * Vote hook event class.
 *
 * @package WordPoints_Democracy_Poll\Hooks
 * @since 1.0.0
 */

/**
 * An event that fires when a user votes in a poll.
 *
 * @since 1.0.0
 */
class WordPoints_Democracy_Poll_Hook_Event_Vote
	extends WordPoints_Hook_Event
	implements WordPoints_Hook_Event_ReversingI {

	/**
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Vote in Poll', 'wordpoints' );
	}

	/**
	 * @since 1.0.0
	 */
	public function get_description() {
		return __( 'When a user votes in a poll created with Democracy Poll.', 'wordpoints' );
	}

	/**
	 * @since 1.0.0
	 */
	public function get_reversal_text() {
		return __( 'Vote retracted.', 'wordpoints' );
	}
}

// EOF
