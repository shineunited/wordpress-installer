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

/**
 * Extension Provider Interface
 *
 * This capability will receive an array with 'config' key as constructor
 * argument. This contains a ShineUnited\Conductor\Configuration\Configuration
 * instance. It also contains a 'plugin' key containing the plugin instance that
 * created the capability.
 */
interface ExtensionProvider extends Capability {

	/**
	 * Retrieve an array of extensions
	 *
	 * @return ExtensionInterface[]
	 */
	public function getExtensions(): array;
}
