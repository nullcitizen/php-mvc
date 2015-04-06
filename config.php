<?php

// Constants for global settings that will not be changed.
// Conditionally checking for env variables before loading in defaults
define('__ROOT__', dirname(__FILE__)); 

define('DB_HOST',   (isset($_ENV['DB_HOST'])) ? $_ENV['DB_HOST'] : 'localhost');
define('DB_NAME',   (isset($_ENV['DB_NAME'])) ? $_ENV['DB_NAME'] : 'homepage');
define('DB_USER',   (isset($_ENV['DB_USER'])) ? $_ENV['DB_USER'] : 'root');
define('DB_PASS',   (isset($_ENV['DB_PASS'])) ? $_ENV['DB_PASS'] : 'root');

// php error reporting needs to be agressive

ini_set('error_reporting', E_ALL);
