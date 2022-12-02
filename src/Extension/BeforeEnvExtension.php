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
class BeforeEnvExtension extends RequirePathExtension {

	/**
	 * Initializes the extension.
	 *
	 * @param string $includePath The path to include in wordpress config.
	 */
	public function __construct(string $includePath) {
		parent::__construct($includePath, LoadEnvironmentConfigExtension::PRIORITY - 1);
	}
}
