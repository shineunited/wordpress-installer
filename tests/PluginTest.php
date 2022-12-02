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

namespace ShineUnited\WordPress\Installer\Tests;

use ShineUnited\WordPress\Installer\Plugin;
use ShineUnited\WordPress\Installer\Provider\BlueprintProvider;
use ShineUnited\WordPress\Installer\Provider\ExtensionProvider;
use ShineUnited\WordPress\Installer\Provider\GitignoreProvider;
use ShineUnited\WordPress\Installer\Provider\InstallerProvider;
use ShineUnited\WordPress\Installer\Provider\NamespaceProvider;
use ShineUnited\WordPress\Installer\Provider\ParameterProvider;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Capability\InstallerProvider as InstallerProviderCapability;
use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider as GitignoreProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Capability\NamespaceProvider as NamespaceProviderCapability;
use Composer\Plugin\PluginInterface;
use Composer\Plugin\Capable;

/**
 * Composer Plugin Test
 */
class PluginTest extends TestCase {

	/**
	 * @return void
	 */
	public function testGetCapabilities(): void {
		$classmap = [
			BlueprintProviderCapability::class => BlueprintProvider::class,
			ExtensionProviderCapability::class => ExtensionProvider::class,
			GitignoreProviderCapability::class => GitignoreProvider::class,
			InstallerProviderCapability::class => InstallerProvider::class,
			NamespaceProviderCapability::class => NamespaceProvider::class,
			ParameterProviderCapability::class => ParameterProvider::class
		];

		$plugin = new Plugin();
		$this->assertInstanceOf(PluginInterface::class, $plugin);
		$this->assertInstanceOf(Capable::class, $plugin);

		$capabilities = $plugin->getCapabilities();
		$this->assertIsArray($capabilities);

		foreach ($classmap as $capability => $provider) {
			$this->assertArrayHasKey($capability, $capabilities);
			$this->assertEquals($provider, $capabilities[$capability]);
		}
	}
}
