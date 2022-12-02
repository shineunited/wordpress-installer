<?php

require_once(__DIR__ . '/autoload.php');

use Roots\WPConfig\Config;
use Env\Env;
use function Env\env;

Env::$options = 0;
{% if config('wordpress.config.convert-bool') %}
Env::$options |= Env::CONVERT_BOOL;
{% endif %}
{% if config('wordpress.config.convert-null') %}
Env::$options |= Env::CONVERT_NULL;
{% endif %}
{% if config('wordpress.config.convert-int') %}
Env::$options |= Env::CONVERT_INT;
{% endif %}
{% if config('wordpress.config.strip-quotes') %}
Env::$options |= Env::STRIP_QUOTES;
{% endif %}
{% if config('wordpress.config.source') == 'env' %}
Env::$options |= Env::USE_ENV_ARRAY;
{% elseif config('wordpress.config.source') == 'server' %}
Env::$options |= Env::USE_SERVER_ARRAY;
{% elseif config('wordpress.config.source') == 'local' %}
Env::$options |= Env::LOCAL_FIRST;
{% endif %}

// Before Init Extensions
{% for extension in extensions %}
{% if extension.loadBeforeInit() %}
require(__DIR__ . '/{{ path(extension.getIncludePath(), 'vendor-dir') }}');
{% endif %}
{% endfor %}

Config::define('WP_ENV_DEFAULT', '{{ config('wordpress.config.default-env') }}');

// After Init Extensions
{% for extension in extensions %}
{% if extension.loadAfterInit() %}
require(__DIR__ . '/{{ path(extension.getIncludePath(), 'vendor-dir') }}');
{% endif %}
{% endfor %}

$scheme = 'http';
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
	$scheme = 'https';
}

$domain = $_SERVER['HTTP_HOST'];

// WP_HOME
{% if path('wordpress.home-dir', 'wordpress.webroot')|length > 0 %}
Config::define('WP_HOME', $scheme . '://' . $domain . '/{{ path('wordpress.home-dir', 'wordpress.webroot') }}');
{% else %}
Config::define('WP_HOME', $scheme . '://' . $domain);
{% endif %}

// WP_SITEURL
{% if path('wordpress.install-dir', 'wordpress.webroot')|length > 0 %}
Config::define('WP_SITEURL', $scheme . '://' . $domain . '/{{ path('wordpress.install-dir', 'wordpress.webroot') }}');
{% else %}
Config::define('WP_SITEURL', $scheme . '://' . $domain);
{% endif %}



// Before Env Extensions
{% for extension in extensions %}
{% if extension.loadBeforeEnv() %}
require(__DIR__ . '/{{ path(extension.getIncludePath(), 'vendor-dir') }}');
{% endif %}
{% endfor %}

// Load Application Config
require_once(__DIR__ . '/{{ path('wordpress.config-dir', 'vendor-dir') }}/application.php');

// Load Environment Config
Config::define('WP_ENV', env('WP_ENV') ?: Config::get('WP_ENV_DEFAULT'));
$envConfig = __DIR__ . '/{{ path('wordpress.config-dir', 'vendor-dir') }}/environments/' . Config::get('WP_ENV') . '.php';
if(file_exists($envConfig)) {
	require_once($envConfig);
}

// WP_CONTENT_DIR
Config::define('WP_CONTENT_DIR', __DIR__ . '/{{ path('wordpress.content-dir', 'vendor-dir') }}');

// WP_CONTENT_URL
Config::define('WP_CONTENT_URL', Config::get('WP_HOME') . '/{{ path('wordpress.content-dir', 'wordpress.webroot') }}');

// After Env Extensions
{% for extension in extensions %}
{% if extension.loadAfterEnv() %}
require(__DIR__ . '/{{ path(extension.getIncludePath(), 'vendor-dir') }}');
{% endif %}
{% endfor %}

// ABSPATH
if(!defined('ABSPATH')) {
	Config::define('ABSPATH', __DIR__ . '/{{ path('wordpress.install-dir', 'vendor-dir') }}/');
}

Config::apply();

require_once(ABSPATH . 'wp-settings.php');