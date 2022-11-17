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

use ShineUnited\WordPress\Installer\Tests\TestCase;

/**
 * Base Extension Test Case
 */
abstract class ExtensionTestCase extends TestCase {

	/**
	 * @return string Extension class.
	 */
	abstract protected function getExtensionClass(): string;

	/**
	 * @return boolean True if expected to load before init.
	 */
	abstract protected function expectedLoadBeforeInit(): bool;

	/**
	 * @return boolean True if expected to load after init.
	 */
	abstract protected function expectedLoadAfterInit(): bool;

	/**
	 * @return boolean True if expected to load before env.
	 */
	abstract protected function expectedLoadBeforeEnv(): bool;

	/**
	 * @return boolean True if expected to load after env.
	 */
	abstract protected function expectedLoadAfterEnv(): bool;

	/**
	 * @return void
	 */
	public function testGetIncludePath(): void {
		$includePaths = [
			'my/test/include/path',
			'path/to/another/test',
			'/not/a/real/path'
		];

		$extensionClass = $this->getExtensionClass();
		foreach ($includePaths as $includePath) {
			$extension = new $extensionClass($includePath);
			$this->assertSame($includePath, $extension->getIncludePath());
		}
	}

	/**
	 * @return void
	 */
	public function testLoadBeforeInit(): void {
		$extensionClass = $this->getExtensionClass();
		$extension = new $extensionClass('includepath');

		$this->assertSame($this->expectedLoadBeforeInit(), $extension->loadBeforeInit());
	}

	/**
	 * @return void
	 */
	public function testLoadAfterInit(): void {
		$extensionClass = $this->getExtensionClass();
		$extension = new $extensionClass('includepath');

		$this->assertSame($this->expectedLoadAfterInit(), $extension->loadAfterInit());
	}

	/**
	 * @return void
	 */
	public function testLoadBeforeEnv(): void {
		$extensionClass = $this->getExtensionClass();
		$extension = new $extensionClass('includepath');

		$this->assertSame($this->expectedLoadBeforeEnv(), $extension->loadBeforeEnv());
	}

	/**
	 * @return void
	 */
	public function testLoadAfterEnv(): void {
		$extensionClass = $this->getExtensionClass();
		$extension = new $extensionClass('includepath');

		$this->assertSame($this->expectedLoadAfterEnv(), $extension->loadAfterEnv());
	}
}
