<?php
/**
 * Application Configuration
 * TODO: Update these values for your environment
 */

// Database configuration (uncomment and configure when database is ready)
/*
define('DB_HOST', 'localhost');
define('DB_NAME', 'autoparts_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');
*/

// Application settings
define('APP_NAME', 'AutoParts Pro');
define('APP_URL', 'http://localhost');
define('APP_TIMEZONE', 'Europe/Moscow');

// Set timezone
date_default_timezone_set(APP_TIMEZONE);

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

