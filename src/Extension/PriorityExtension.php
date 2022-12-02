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
 * Abstract Priority Extension
 */
abstract class PriorityExtension implements ExtensionInterface {
	private int $priority;

	/**
	 * Initializes the extension.
	 *
	 * @param integer $priority The extension loading priority.
	 */
	public function __construct(int $priority = 50) {
		$this->priority = $priority;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getPriority(): int {
		return $this->priority;
	}
}
