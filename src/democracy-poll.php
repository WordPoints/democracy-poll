<?php

/**
 * Main file of the module.
 *
 * ---------------------------------------------------------------------------------|
 * Copyright 2017  J.D. Grimes  (email : jdg@codesymphony.co)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2 or later, as
 * published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * ---------------------------------------------------------------------------------|
 *
 * @package Democracy_Poll
 * @version 1.0.0
 * @author  J.D. Grimes <jdg@codesymphony.co>
 * @license GPLv2+
 */

WordPoints_Modules::register(
	'
		Module Name: Democracy Poll
		Author:      J.D. Grimes
		Author URI:  https://codesymphony.co/
		Module URI:  https://wordpoints.org/module/democracy-poll/
		Version:     1.0.0
		License:     GPLv2+
		Description: Integrates with the Democracy Poll plugin, to award points for taking polls.
		Text Domain: wordpoints-democracy-poll
		Domain Path: /languages
		Channel:     wordpoints.org
		ID:          988
		Namespace:   Democracy_Poll
	'
	, __FILE__
);

WordPoints_Class_Autoloader::register_dir( dirname( __FILE__ ) . '/classes/' );

// EOF