<?php
	// Show debug messages
	define ('DEBUG', false);

	// Database connection
	define('DB_NAME', '_mvideo');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');

	// Website URL and path
	define('WEBSITE_URL', 'http://mvideo');
	define('WEBSITE_TITLE', 'MVideo');

	// Default controller to load — homepage requests are sent to this controller
	define('DEFAULT_CONTROLLER', 'home'); 