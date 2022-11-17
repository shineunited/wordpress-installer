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

use ShineUnited\WordPress\Installer\Extension\ExtensionInterface;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Blueprint\TwigBlueprint;
use ShineUnited\Conductor\Configuration\Configuration;
use ShineUnited\WordPress\Installer\Capability\ExtensionProvider as ExtensionProviderCapability;
use Composer\Plugin\PluginManager;

/**
 * Namespace Provider
 */
class BlueprintProvider implements BlueprintProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getBlueprints(): array {
		return [
			new TwigBlueprint('{$wordpress.home-dir}/index.php', '@wordpress/core/index.php'),
			new TwigBlueprint('{$wordpress.home-dir}/.htaccess', '@wordpress/core/htaccess'),
			new TwigBlueprint('{$wordpress.muplugins-dir}/autoloader.php', '@wordpress/content/autoloader.php'),
			new TwigBlueprint('{$wordpress.content-dir}/index.php', '@wordpress/content/silence.php'),
			new TwigBlueprint('{$wordpress.muplugins-dir}/index.php', '@wordpress/content/silence.php'),
			new TwigBlueprint('{$wordpress.plugins-dir}/index.php', '@wordpress/content/silence.php'),
			new TwigBlueprint('{$wordpress.themes-dir}/index.php', '@wordpress/content/silence.php'),
			new TwigBlueprint('{$wordpress.uploads-dir}/index.php', '@wordpress/content/silence.php'),
			new TwigBlueprint('{$working-dir}/wp-cli.yml', '@wordpress/core/wp-cli.yml'),
			new TwigBlueprint('{$wordpress.config-dir}/application.php', '@wordpress/config/application.php', [], 'ask', 'never'),
			new TwigBlueprint('{$wordpress.config-dir}/environment/production.php', '@wordpress/config/production.php', [], 'ask', 'never'),
			new TwigBlueprint('{$wordpress.config-dir}/environment/staging.php', '@wordpress/config/staging.php', [], 'ask', 'never'),
			new TwigBlueprint('{$wordpress.config-dir}/environment/development.php', '@wordpress/config/development.php', [], 'ask', 'never'),
			new TwigBlueprint('{$wordpress.wpconfig-dir}/wp-config.php', '@wordpress/config/wp-config.php', [
				'extensions' => function (Configuration $config, PluginManager $pluginManager) {
					$extensions = [];
					$providers = $pluginManager->getPluginCapabilities(ExtensionProviderCapability::class, [
						'config' => $config
					]);
					foreach ($providers as $provider) {
						foreach ($provider->getExtensions() as $extension) {
							if (!$extension instanceof ExtensionInterface) {
								throw new \Exception('Invalid extension: ' . get_class($extension));
							}

							$extensions[] = $extension;
						}
					}

					return $extensions;
				}
			])
		];
	}
}
