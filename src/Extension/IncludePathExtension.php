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
 * Include Path Extension
 */
class IncludePathExtension extends PathExtension {

	/**
	 * {@inheritDoc}
	 */
	public function generateCode(Configuration $config): string {
		return 'include(\'' . addslashes($this->getPath($config)) . '\');';
	}
}
