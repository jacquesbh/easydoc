<?php

/**
 * The Composer autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';

use Easydoc\App;

/**
 * Dispatch the Easydoc Application
 */
App::run()->dispatch();

