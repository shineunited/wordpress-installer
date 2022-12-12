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

use ShineUnited\WordPress\Installer\Extension\PathExtension;
use ReflectionClass;

/**
 * Base Path Extension Test Case
 */
abstract class PathExtensionTestCase extends ExtensionTestCase {

	/**
	 * @return string Expected path.
	 */
	abstract protected function expectedPath(): string;

	/**
	 * @return void
	 */
	public function testConstructor(): void {
		parent::testConstructor();

		$extension = $this->createExtension();

		$this->assertInstanceOf(PathExtension::class, $extension);
	}

	/**
	 * @return void
	 */
	public function testGetPath(): void {
		$this->toDo();
	}

	/**
	 * @return void
	 */
	public function testGenerateCode(): void {
		$this->toDo();
	}
}
