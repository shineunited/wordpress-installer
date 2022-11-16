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

namespace ShineUnited\WordPress\Installer\Capability;

use ShineUnited\WordPress\Installer\Extension\ExtensionInterface;
use Composer\Plugin\Capability\Capability;

interface ExtensionProvider extends Capability {

	/**
	 * Retrieve an array of extensions
	 *
	 * @return ExtensionInterface[]
	 */
	public function getExtensions(): array;
}
