<?php

/**
 * Simulates being in the admin for the installation of the Democracy Poll plugin.
 *
 * Without this, the activation will error:
 *
 * ```
 * Fatal error: Uncaught Error: Call to undefined method Dem::update_options() in
 *    /plugins/democracy-poll/class.DemInit.php on line 133
 * ```
 *
 * This is caused by the value the `update_options()` method being only a part of the
 * child, `DemAdminInit` class, but being called by the parent, `Dem` class. Only
 * one of these two classes is actually constructed, depending on whether we are in
 * the admin. Since the method ends up being called by the activation routine, it is
 * important that during activation we are in the admin.
 *
 * Yes, this is confusing, and ultimately, it is a really bad idea.
 *
 * @package WordPoints_Democracy_Poll\PHPUnit
 * @since   1.0.0
 */

global $current_screen;

/**
 * The WP_Screen class.
 *
 * @since 1.0.0
 */
require_once ABSPATH . '/wp-admin/includes/class-wp-screen.php';

$current_screen = WP_Screen::get( 'test' );

// EOF
