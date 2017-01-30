<?php

/**
 * Voter hook arg class.
 *
 * @package WordPoints_Democracy_Poll\Hooks
 * @since 1.0.0
 */

/**
 * Represents the current voter as a hook arg.
 *
 * @since 1.0.0
 */
class WordPoints_Democracy_Poll_Hook_Arg_Voter
	extends WordPoints_Hook_Arg_Current_User {

	/**
	 * @since 1.0.0
	 */
	public function get_title() {
		return __( 'Voter', 'wordpoints' );
	}
}

// EOF
