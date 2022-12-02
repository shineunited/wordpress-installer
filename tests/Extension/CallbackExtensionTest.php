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

use ShineUnited\WordPress\Installer\Extension\CallbackExtension;

/**
 * Callback Extension Test
 */
class CallbackExtensionTest extends ExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return CallbackExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getConstructorArguments(): array {
		return [
			'phpinfo',
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
	 * @return void
	 */
	public function testGetCallback(): void {
		$extension = $this->createExtension();

		$this->assertSame('phpinfo', $extension->getCallback());
	}

	/**
	 * @return void
	 */
	public function testGenerateCode(): void {
		$this->toDo();
	}
}
