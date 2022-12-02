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

use ShineUnited\WordPress\Installer\Extension\DefineWPContentURLExtension;

/**
 * Define WP_CONTENT_URL Extension Test
 */
class DefineWPContentURLExtensionTest extends ExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return DefineWPContentURLExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getConstructorArguments(): array {
		return [];
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedPriority(): int {
		return 4001;
	}

	/**
	 * @return void
	 */
	public function testGenerateCode(): void {
		$this->toDo();
	}
}
