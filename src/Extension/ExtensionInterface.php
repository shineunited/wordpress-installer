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
 * Extension Interface
 */
interface ExtensionInterface {

	/**
	 * Get the extension loading priority.
	 *
	 * @return integer The priority.
	 */
	public function getPriority(): int;

	/**
	 * Generate the extension code.
	 *
	 * @param Configuration $config The conductor configuration.
	 *
	 * @return string The code.
	 */
	public function generateCode(Configuration $config): string;
}
