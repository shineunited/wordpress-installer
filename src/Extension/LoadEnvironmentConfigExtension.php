<?php

/**
 * This file is part of WordPress Installer.
 *
 * (c) Shine United LLC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ShineUnited\WordPress\Installer\Extension;

use ShineUnited\Conductor\Configuration\Configuration;
use Symfony\Component\Filesystem\Path;

/**
 * Load Environment Config Extension
 */
class LoadEnvironmentConfigExtension extends PriorityExtension {
	public const PRIORITY = 3000;

	/**
	 * Initializes the extension.
	 */
	public function __construct() {
		parent::__construct(static::PRIORITY);
	}

	/**
	 * {@inheritDoc}
	 */
	public function generateCode(Configuration $config): string {
		$code = [];

		$configPath = Path::makeRelative($config['wordpress.config-dir'], $config['vendor-dir']);

		$code[] = 'Config::define(\'WP_ENV\', env(\'WP_ENV\') ?: Config::get(\'WP_ENV_DEFAULT\'));';
		$code[] = 'require_once(__DIR__ . \'/' . addslashes($configPath) . '/application.php\');';
		$code[] = '$envConfig = __DIR__ . \'/' . addslashes($configPath) . '/environments/\' . Config::get(\'WP_ENV\') . \'.php\';';
		$code[] = 'if (file_exists($envConfig)) {';
		$code[] = '	require_once($envConfig);';
		$code[] = '}';

		return implode(PHP_EOL, $code);
	}
}
