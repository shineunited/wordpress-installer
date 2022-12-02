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

use ShineUnited\Conductor\Addon\Gitignore\Capability\GitignoreProvider as GitignoreProviderCapability;
use ShineUnited\Conductor\Addon\Gitignore\Pattern\Rule;

/**
 * Gitignore Provider
 */
class GitignoreProvider implements GitignoreProviderCapability {

	/**
	 * {@inheritDoc}
	 */
	public function getGitignores(): array {
		return [
			new Rule('{$wordpress.home-dir}/index.php'),
			new Rule('{$wordpress.home-dir}/.htaccess'),
			new Rule('{$wordpress.muplugins-dir}/autoloader.php'),
			new Rule('{$wordpress.content-dir}/index.php'),
			new Rule('{$wordpress.muplugins-dir}/index.php'),
			new Rule('{$wordpress.plugins-dir}/index.php'),
			new Rule('{$wordpress.themes-dir}/index.php'),
			new Rule('{$wordpress.uploads-dir}'),
			new Rule('{$wordpress.upgrade-dir}'),
			new Rule('{$wordpress.wpconfig-dir}/wp-config.php'),
		];
	}
}
