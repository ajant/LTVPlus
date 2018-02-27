<?php

declare(strict_types=1);

// HTTP methods
define('HTTP_METHOD_GET', 'GET');

// content types
define('CONTENT_TYPE_JSON', 'application/json');
define('CONTENT_TYPE_HTML', 'text/html');

// CORS headers
define('ACCESS_CONTROL_ALLOW_ORIGIN', '*');
define('ACCESS_CONTROL_ALLOW_METHODS', 'GET, OPTIONS');

// project paths
define('PATH_PROJECT', realpath(__DIR__ . '/../') . '/');
define('PATH_BOOTSTRAP', realpath(PATH_PROJECT . 'bootstrap') . '/');
define('PATH_CONFIG', realpath(PATH_PROJECT . 'config/') . '/');
