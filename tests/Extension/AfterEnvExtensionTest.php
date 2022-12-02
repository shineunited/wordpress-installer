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

use ShineUnited\WordPress\Installer\Extension\AfterEnvExtension;
use ShineUnited\WordPress\Installer\Extension\LoadEnvironmentConfigExtension;

/**
 * After Env Extension Test
 */
class AfterEnvExtensionTest extends PathExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return AfterEnvExtension::class;
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
		return LoadEnvironmentConfigExtension::PRIORITY + 1;
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
