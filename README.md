# shineunited/wordpress-installer

[![License](https://img.shields.io/packagist/l/shineunited/wordpress-installer)](https://github.com/shineunited/wordpress-installer/blob/main/LICENSE)
[![Latest Version](https://img.shields.io/packagist/v/shineunited/wordpress-installer?label=latest)](https://packagist.org/packages/shineunited/wordpress-installer/)
[![PHP Version](https://img.shields.io/packagist/dependency-v/shineunited/wordpress-installer/php?label=php)](https://www.php.net/releases/index.php)
[![Main Status](https://img.shields.io/github/workflow/status/shineunited/wordpress-installer/Build/main?label=main)](https://github.com/shineunited/wordpress-installer/actions/workflows/build.yml?query=branch%3Amain)
[![Release Status](https://img.shields.io/github/workflow/status/shineunited/wordpress-installer/Build/release?label=release)](https://github.com/shineunited/wordpress-installer/actions/workflows/build.yml?query=branch%3Arelease)
[![Develop Status](https://img.shields.io/github/workflow/status/shineunited/wordpress-installer/Build/develop?label=develop)](https://github.com/shineunited/wordpress-installer/actions/workflows/build.yml?query=branch%3Adevelop)

## Description

A WordPress installer built with Conductor.


## Installation

to add wordpress-installer, the recommended method is via composer.
```sh
$ composer require shineunited/wordpress-installer
```


## Configuration
The wordpress installer uses the Conductor configuration framework to parse parameters in the 'extra' section of the project's composer.json file.

### Parameters

#### Configurable Parameters
The following parameters can be defined in the 'extra' section of the composer.json file.

###### wordpress.webroot
(path) Path to the webroot directory. Defaults to 'web'.

###### wordpress.home-dir
(path) Path to wordpress home directory, used to define WP_HOME and WP_SITEURL. Must be within the webroot. Defaults to '{$wordpress.webroot}'.

###### wordpress.install-dir
(path) Path to the wordpress installation directory. Must be within the home-dir. Defaults to '{$wordpress.home-dir}/wp'.

###### wordpress.config-dir
(path) Path to the deployments configuration directory. Must be outside of the webroot. Defaults to 'cfg'.

###### wordpress.content-dir
(path) Path to wordpress content directory. Must be inside the home-dir but outside of the install-dir. Defaults to '{$wordpress.home-dir}/app'.

###### wordpress.config.convert-bool
(boolean) If true boolean environment configuration variables will automatically be converted. Defaults to true.

###### wordpress.config.convert-null
(boolean) If true null environment configuration variables will automatically be converted. Defaults to true.

###### wordpress.config.convert-int
(boolean) If true integer environment configuration variables will automatically be converted. Defaults to true.

###### wordpress.config.strip-quotes
(boolean) If true string environment configuration variables will automatically have quotes stripped from them if found. Defaults to true.

###### wordpress.config.source
(select) Must be one of 'env', 'server', or 'local'. Defines where environment configuration variables come from. Defaults to false (none).
* 'env' - pull from $_ENV
* 'server' - pull from $_SERVER
* 'local' - use getenv() with local flag
* (none) - use getenv()

###### wordpress.config.default-env
(select) Defines the default environment name, used if environment is not defined explicitly elsewhere. Must be 'production', 'staging', or 'development'. Defaults to 'production'.

#### Calculated Parameters
The following parameters are available for use but cannot be overridden in the project's composer.json file.

###### wordpress.wpconfig-dir
(path) Path to directory where the wp-config.php file will be created. Locked to the directory above the install-dir.

###### wordpress.muplugins-dir
(path) Path to the wordpress mu-plugins directory. Locked to '{$wordpress.content-dir}/mu-plugins'.

###### wordpress.plugins-dir
(path) Path to the wordpress plugins directory. Locked to '{$wordpress.content-dir}/plugins'.

###### wordpress.themes-dir
(path) Path to the wordpress themes directory. Locked to '{$wordpress.content-dir}/themes'.

###### wordpress.uploads-dir
(path) Path to the wordpress uploads directory. Locked to '{$wordpress.content-dir}/uploads'.

###### wordpress.upgrade-dir
(path) Path to the wordpress upgrade directory. Locked to '{$wordpress.content-dir}/upgrade'.

### Example

```json
{
	"name": "example/project",
	"type": "project",
	"extra": {
		"wordpress": {
			"webroot": "web",
			"install-dir": "web/wp",
			"content-dir": "web/app",
			"config-dir": "cfg",
			"config": {
				"source": "server",
				"default-env": "production"
			}
		}
	}
}
```

## Usage

### ExtensionProvider Capability
Extensions to the WordPress configuration can be added via the ExtensionProvider capability by composer plugins.

#### Example Plugin
The plugin must implement Capable and provide the ExtensionProvider capability.
```php
<?php

namespace Example\Project;

use Composer\Composer;
use Composer\IO\IOInterface;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider;

class ComposerPlugin implements PluginInterface, Capable {

	public function activate(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function deactivate(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function uninstall(Composer $composer, IOInterface $io): void {
		// ...
	}

	public function getCapabilities(): array {
		return [
			ExtensionProvider::class => ExampleExtensionProvider::class
		];
	}
}
```

#### Example Provider
The provider must implement the capability, and return a list of ExtensionInterface objects.
```php
<?php

namespace Example\Project;

use ShineUnited\WordPress\Installer\Capability\ExtensionProvider;
use ShineUnited\WordPress\Installer\Extension\BeforeInitExtension;
use ShineUnited\WordPress\Installer\Extension\AfterInitExtension;
use ShineUnited\WordPress\Installer\Extension\BeforeEnvExtension;
use ShineUnited\WordPress\Installer\Extension\AfterEnvExtension;

class ExampleExtensionProvider implements ExtensionProvider {

	public function getExtensions(): array {
		return [
			new BeforeInitExtension('inc/before-init.php'), // include before init config
			new AfterInitExtension('inc/after-init.php'), // include after init config
			new BeforeEnvExtension('inc/before-env.php'), // include before env config
			new AfterEnvExtension('inc/after-env.php'), // include after env config
		];
	}
}
```
