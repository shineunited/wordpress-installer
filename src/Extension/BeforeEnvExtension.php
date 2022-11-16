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
 * Before Env Extension
 */
class BeforeEnvExtension implements ExtensionInterface {
	private string $includePath;

	/**
	 * Initializes the extension.
	 *
	 * @param string $includePath The path to include in wordpress config.
	 */
	public function __construct(string $includePath) {
		$this->includePath = $includePath;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getIncludePath(): string {
		return $this->includePath;
	}

	/**
	 * {@inheritDoc}
	 */
	public function loadBeforeInit(): bool {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	public function loadAfterInit(): bool {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	public function loadBeforeEnv(): bool {
		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	public function loadAfterEnv(): bool {
		return false;
	}
}
