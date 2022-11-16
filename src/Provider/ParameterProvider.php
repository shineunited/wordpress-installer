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

use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Configuration\Configuration;
use ShineUnited\Conductor\Configuration\Parameter\BooleanParameter;
use ShineUnited\Conductor\Configuration\Parameter\PathParameter;
use ShineUnited\Conductor\Configuration\Parameter\SelectParameter;

/**
 * Namespace Provider
 */
class ParameterProvider implements ParameterProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getParameters(): array {
		return [
			// Global
			new PathParameter('wordpress.webroot', 'web', [
				'inside'  => '{$working-dir}'
			]),
			new PathParameter('wordpress.home-dir', '{$wordpress.webroot}', [
				'inside'  => '{$wordpress.webroot}'
			]),

			// Core
			new PathParameter('wordpress.install-dir', '{$wordpress.home-dir}/wp', [
				'inside'  => '{$wordpress.home-dir}'
			]),

			// Config
			new PathParameter('wordpress.wpconfig-dir', function (Configuration $config) {
				return dirname($config['wordpress.install-dir']);
			}, [], true),
			new PathParameter('wordpress.config-dir', 'cfg', [
				'outside' => '{$wordpress.webroot}'
			]),

			// Content
			new PathParameter('wordpress.content-dir', '{$wordpress.home-dir}/app', [
				'inside'  => '{$wordpress.home-dir}',
				'outside' => '{$wordpress.install-dir}'
			]),
			new PathParameter('wordpress.muplugins-dir', '{$wordpress.content-dir}/mu-plugins', [], true),
			new PathParameter('wordpress.plugins-dir', '{$wordpress.content-dir}/plugins', [], true),
			new PathParameter('wordpress.themes-dir', '{$wordpress.content-dir}/themes', [], true),
			new PathParameter('wordpress.uploads-dir', '{$wordpress.content-dir}/uploads', [], true),
			new PathParameter('wordpress.upgrade-dir', '{$wordpress.content-dir}/upgrade', [], true),

			new BooleanParameter('wordpress.config.convert-bool', true),
			new BooleanParameter('wordpress.config.convert-null', true),
			new BooleanParameter('wordpress.config.convert-int', true),
			new BooleanParameter('wordpress.config.strip-quotes', true),
			new SelectParameter('wordpress.config.source', false, [
				'options' => ['env', 'server', 'local']
			]),
			new SelectParameter('wordpress.config.default-env', 'production', [
				'options' => ['production', 'staging', 'development']
			]),
		];
	}
}
