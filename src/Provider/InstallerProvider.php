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

namespace ShineUnited\WordPress\Installer\Provider;

use ShineUnited\Conductor\Capability\InstallerProvider as InstallerProviderCapability;
use ShineUnited\Conductor\Filesystem\Installer\PathInstaller;

/**
 * Namespace Provider
 */
class InstallerProvider implements InstallerProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getInstallers(): array {
		return [
			new PathInstaller('wordpress-core', '{$wordpress.install-dir}'),
			new PathInstaller('wordpress-muplugin', '{$wordpress.muplugins-dir}/{$name}'),
			new PathInstaller('wordpress-plugin', '{$wordpress.plugins-dir}/{$name}'),
			new PathInstaller('wordpress-theme', '{$wordpress.themes-dir}/{$name}'),
		];
	}
}
