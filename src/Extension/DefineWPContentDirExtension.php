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
 * Define WP_CONTENT_DIR Extension
 */
class DefineWPContentDirExtension extends PriorityExtension {
	public const PRIORITY = 4000;

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

		$path = Path::makeRelative($config['wordpress.content-dir'], $config['vendor-dir']);
		$code[] = 'Config::define(\'WP_CONTENT_DIR\', __DIR__ . \'/' . addslashes($path) . '\');';

		return implode(PHP_EOL, $code);
	}
}
