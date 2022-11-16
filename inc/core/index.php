<?php

/* Start WordPress */
require(__DIR__ . '/{{ path('wordpress.install-dir', 'wordpress.home-dir') }}/index.php');

if(!defined('WEBROOT')) {
	define('WEBROOT', __DIR__);
}
