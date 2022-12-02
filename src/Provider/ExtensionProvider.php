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

use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;
use ShineUnited\WordPress\Installer\Extension\DefineWPHomeExtension;
use ShineUnited\WordPress\Installer\Extension\DefineWPSiteURLExtension;
use ShineUnited\WordPress\Installer\Extension\DefineWPContentDirExtension;
use ShineUnited\WordPress\Installer\Extension\DefineWPContentURLExtension;
use ShineUnited\WordPress\Installer\Extension\LoadEnvironmentConfigExtension;
use ShineUnited\WordPress\Installer\Extension\InitializeConfigExtension;

/**
 * Extension Provider
 */
class ExtensionProvider implements ExtensionProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getExtensions(): array {
		return [
			new DefineWPHomeExtension(),
			new DefineWPSiteURLExtension(),
			new DefineWPContentDirExtension(),
			new DefineWPContentURLExtension(),
			new LoadEnvironmentConfigExtension(),
			new InitializeConfigExtension(),
		];
	}
}
