<?php

/**
 * The PHPUnit tests ~~functions~~ bootstrap.
 *
 * @package WordPoints_Democracy_Poll\PHPUnit
 * @since   1.0.0
 */

$loader = WordPoints_PHPUnit_Bootstrap_Loader::instance();
$loader->add_php_file( dirname( __FILE__ ) . '/simulate-admin.php', 'before' );
$loader->add_plugin( 'democracy-poll/democracy.php' );

// EOF
