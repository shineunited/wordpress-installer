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

/**
 * Initialize Config Extension
 */
class InitializeConfigExtension extends PriorityExtension {
	public const PRIORITY = 1000;

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

		$code[] = 'Config::define(\'WP_ENV_DEFAULT\', \'' . $config['wordpress.config.default-env'] . '\');';
		$code[] = 'Config::define(\'URL_SCHEME\', \'http\');';
		$code[] = 'if (isset($_SERVER[\'HTTPS\']) && $_SERVER[\'HTTPS\'] == \'on\') {';
		$code[] = '	Config::define(\'URL_SCHEME\', \'https\');';
		$code[] = '}';
		$code[] = 'Config::define(\'URL_DOMAIN\', $_SERVER[\'HTTP_HOST\']);';

		return implode(PHP_EOL, $code);
	}
}
