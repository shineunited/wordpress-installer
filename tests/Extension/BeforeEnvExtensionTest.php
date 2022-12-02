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

use ShineUnited\WordPress\Installer\Extension\BeforeEnvExtension;
use ShineUnited\WordPress\Installer\Extension\LoadEnvironmentConfigExtension;

/**
 * Before Env Extension Test
 */
class BeforeEnvExtensionTest extends PathExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return BeforeEnvExtension::class;
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
		return LoadEnvironmentConfigExtension::PRIORITY - 1;
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
