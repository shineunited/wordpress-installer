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
 * Abstract Path Extension
 */
abstract class PathExtension extends PriorityExtension {
	private string $path;

	/**
	 * Initializes the extension.
	 *
	 * @param string  $path     The file path to use.
	 * @param integer $priority The extension loading priority.
	 */
	public function __construct(string $path, int $priority = 50) {
		$this->path = $path;

		parent::__construct($priority);
	}

	/**
	 * Get the path.
	 *
	 * @param Configuration $config The conductor configuration.
	 *
	 * @return string The path.
	 */
	public function getPath(Configuration $config): string {
		$path = $config->processStringValue($this->path);

		$path = Path::canonicalize($path);
		$path = Path::makeRelative($path, $config['vendor-dir']);

		return $path;
	}
}
