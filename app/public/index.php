<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

/* This is needed to support the Fly Proxy which uses the custom 'Fly-Client-IP' header */
if (isset($_SERVER['HTTP_FLY_CLIENT_IP'])) {
    $_SERVER['HTTP_X_FORWARDED_FOR'] = $_SERVER['HTTP_FLY_CLIENT_IP'];
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
