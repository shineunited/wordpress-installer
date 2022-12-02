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

{% for extension in extensions %}
/**
 * Priority: {{ extension.priority }}
 * Plugin:   {{ extension.plugin }}
 * Class:    {{ extension.class }}
 */
{{ extension.code|trim|raw }}

{% endfor %}

Config::apply();
