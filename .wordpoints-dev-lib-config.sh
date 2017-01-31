#!/usr/bin/env bash

# Install Democracy Poll when running tests.
install-democracy-poll() {

	mkdir -p /tmp/wordpress/src/wp-content/plugins/democracy-poll
	curl -s https://downloads.wordpress.org/plugin/democracy-poll.zip > /tmp/democracy-poll.zip
	unzip /tmp/democracy-poll.zip -d /tmp/wordpress/src/wp-content/plugins/
}

# Sets up custom configuration.
function wordpoints-dev-lib-config() {

	alias setup-phpunit="composer self-update; \setup-phpunit; install-democracy-poll"
}

# EOF
