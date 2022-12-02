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

use ShineUnited\WordPress\Installer\Extension\BeforeInitExtension;
use ShineUnited\WordPress\Installer\Extension\InitializeConfigExtension;

/**
 * Before Init Extension Test
 */
class BeforeInitExtensionTest extends PathExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return BeforeInitExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getConstructorArguments(): array {
		return [
			$this->expectedPath()
		];
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedPriority(): int {
		return InitializeConfigExtension::PRIORITY - 1;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedPath(): string {
		return 'path/to/include';
	}

	/**
	 * @return void
	 */
	public function testGenerateCode(): void {
		$this->toDo();
	}
}
