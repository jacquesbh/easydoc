<?php

/**
 * The Composer autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Easydoc\App;

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Dispatch the Easydoc Application
 */
App::run()->dispatch();

