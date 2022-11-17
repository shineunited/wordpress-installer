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

namespace ShineUnited\WordPress\Installer\Tests\Provider;

use ShineUnited\WordPress\Installer\Provider\InstallerProvider;
use ShineUnited\Conductor\Capability\InstallerProvider as InstallerProviderCapability;
use ShineUnited\Conductor\Filesystem\Installer\InstallerInterface;

/**
 * Installer Provider Test
 */
class InstallerProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return InstallerProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return InstallerProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getInstallers';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return InstallerInterface::class;
	}
}
