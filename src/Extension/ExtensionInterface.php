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
 * Extension Interface
 */
interface ExtensionInterface {

	/**
	 * Get the include path.
	 *
	 * @return string The include path.
	 */
	public function getIncludePath(): string;

	/**
	 * Check if this extension should be included before init.
	 *
	 * @return boolean True if extension should be included before init.
	 */
	public function loadBeforeInit(): bool;

	/**
	 * Check if this extension should be included after init.
	 *
	 * @return boolean True if extension should be included after init.
	 */
	public function loadAfterInit(): bool;

	 /**
	 * Check if this extension should be included before env.
	 *
	 * @return boolean True if extension should be included before env.
	 */
	public function loadBeforeEnv(): bool;

	 /**
	 * Check if this extension should be included after env.
	 *
	 * @return boolean True if extension should be included after env.
	 */
	public function loadAfterEnv(): bool;
}
