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

use ShineUnited\WordPress\Installer\Provider\NamespaceProvider;
use ShineUnited\Conductor\Addon\Twig\Capability\NamespaceProvider as NamespaceProviderCapability;
use ShineUnited\Conductor\Addon\Twig\Loader\TwigNamespace;

/**
 * Namespace Provider Test
 */
class NamespaceProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return NamespaceProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return NamespaceProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getNamespaces';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return TwigNamespace::class;
	}
}
