<?php
/**
 * Application Configuration
 * TODO: Update these values for your environment
 */

// Database configuration
define('DB_HOST', getenv('DB_HOST') ?: 'db');
define('DB_NAME', getenv('DB_NAME') ?: 'autoparts_db');
define('DB_USER', getenv('DB_USER') ?: 'autoparts_user');
define('DB_PASS', getenv('DB_PASS') ?: 'autoparts_pass');
define('DB_CHARSET', 'utf8mb4');
define('DB_PORT', getenv('DB_PORT') ?: '3306');

// Application settings
define('APP_NAME', 'AutoParts Pro');
define('APP_URL', 'http://localhost');
define('APP_TIMEZONE', 'Europe/Moscow');

// Set timezone
date_default_timezone_set(APP_TIMEZONE);

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

