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

namespace ShineUnited\WordPress\Installer\Tests\Extension;

use ShineUnited\WordPress\Installer\Extension\AfterInitExtension;

/**
 * Base Provider Test Case
 */
class AfterInitExtensionTest extends ExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return AfterInitExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedLoadBeforeInit(): bool {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedLoadAfterInit(): bool {
		return true;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedLoadBeforeEnv(): bool {
		return false;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedLoadAfterEnv(): bool {
		return false;
	}
}
