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

use ShineUnited\WordPress\Installer\Extension\RequirePathExtension;
use ShineUnited\Conductor\Configuration\Configuration;

/**
 * Require Path Extension Test
 */
class RequirePathExtensionTest extends PathExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return RequirePathExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getConstructorArguments(): array {
		return [
			$this->expectedPath(),
			$this->expectedPriority()
		];
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedPriority(): int {
		return 12345;
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
