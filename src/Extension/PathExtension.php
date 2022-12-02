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
	 * @return string The path.
	 */
	public function getPath(): string {
		return $this->path;
	}
}
