<?php

/**
 * Hook up the module's action and filter hooks.
 *
 * @package WordPoints_Democracy_Poll\Hooks
 * @since 1.0.0
 */

add_action( 'wordpoints_init_app_registry-hooks-events', 'wordpoints_democracy_poll_hook_events_init' );
add_action( 'wordpoints_init_app_registry-hooks-actions', 'wordpoints_democracy_poll_hook_actions_init' );

// EOF
