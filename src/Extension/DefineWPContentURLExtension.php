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
 * Define WP_CONTENT_URL Extension
 */
class DefineWPContentURLExtension extends PriorityExtension {
	public const PRIORITY = 4001;

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

		$path = Path::makeRelative($config['wordpress.content-dir'], $config['wordpress.webroot']);
		$code[] = 'Config::define(\'WP_CONTENT_URL\', Config::get(\'WP_HOME\') . \'/' . addslashes($path) . '\');';

		return implode(PHP_EOL, $code);
	}
}
