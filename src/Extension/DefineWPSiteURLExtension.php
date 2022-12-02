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
 * Define WP_SITEURL Extension
 */
class DefineWPSiteURLExtension extends PriorityExtension {
	public const PRIORITY = 2001;

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

		$path = '';
		if ($config['wordpress.install-dir'] != $config['wordpress.webroot']) {
			$path = '/' . Path::makeRelative($config['wordpress.install-dir'], $config['wordpress.webroot']);
		}

		$code[] = 'Config::define(\'WP_SITEURL\', Config::get(\'URL_SCHEME\') . \'://\' . Config::get(\'URL_DOMAIN\') . \'' . addslashes($path) . '\');';

		return implode(PHP_EOL, $code);
	}
}
