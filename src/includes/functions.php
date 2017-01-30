<?php

/**
 * The module's main functions.
 *
 * @package WordPoints_Democracy_Poll
 * @since 1.0.0
 */

/**
 * Register hook actions when the action registry is initialized.
 *
 * @since 1.0.0
 *
 * @WordPress\action wordpoints_init_app_registry-hooks-actions
 *
 * @param WordPoints_Hook_Actions $actions The action registry.
 */
function wordpoints_democracy_poll_hook_actions_init( $actions ) {

	$actions->register(
		'democracy_poll_vote_add'
		, 'WordPoints_Hook_Action'
		, array(
			'action' => 'dem_voted',
		)
	);

	$actions->register(
		'democracy_poll_vote_delete'
		, 'WordPoints_Hook_Action'
		, array(
			'action' => 'dem_vote_deleted',
		)
	);
}

/**
 * Register hook events when the event registry is initialized.
 *
 * @since 1.0.0
 *
 * @WordPress\action wordpoints_init_app_registry-hooks-events
 *
 * @param WordPoints_Hook_Events $events The event registry.
 */
function wordpoints_democracy_poll_hook_events_init( $events ) {

	$events->register(
		'democracy_poll_vote'
		, 'WordPoints_Democracy_Poll_Hook_Event_Vote'
		, array(
			'actions' => array(
				'toggle_on'  => 'democracy_poll_vote_add',
				'toggle_off' => 'democracy_poll_vote_delete',
			),
			'args' => array(
				'current:user' => 'WordPoints_Democracy_Poll_Hook_Arg_Voter',
			),
		)
	);
}

// EOF
