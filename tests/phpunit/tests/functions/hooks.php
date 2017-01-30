<?php

/**
 * Test case for the hooks functions.
 *
 * @package WordPoints_Democracy_Poll\PHPUnit\Tests
 * @since 1.0.0
 */

/**
 * Tests the hooks functions.
 *
 * @since 1.0.0
 */
class WordPoints_Democracy_Poll_Hooks_Functions_Test
	extends WordPoints_PHPUnit_TestCase_Hooks {

	/**
	 * Test the action registration function.
	 *
	 * @since 1.0.0
	 *
	 * @covers ::wordpoints_democracy_poll_hook_actions_init
	 */
	public function test_actions() {

		$this->mock_apps();

		$actions = wordpoints_hooks()->get_sub_app( 'actions' );

		wordpoints_democracy_poll_hook_actions_init( $actions );

		$this->assertTrue( $actions->is_registered( 'democracy_poll_vote_add' ) );
		$this->assertTrue( $actions->is_registered( 'democracy_poll_vote_delete' ) );
	}

	/**
	 * Test the events registration function.
	 *
	 * @since 1.0.0
	 *
	 * @covers ::wordpoints_democracy_poll_hook_events_init
	 */
	public function test_events() {

		$this->mock_apps();

		$events = wordpoints_hooks()->get_sub_app( 'events' );

		wordpoints_democracy_poll_hook_events_init( $events );

		$this->assertEventRegistered( 'democracy_poll_vote', 'current:user' );
	}
}

// EOF
