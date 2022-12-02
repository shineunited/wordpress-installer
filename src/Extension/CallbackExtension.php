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

namespace ShineUnited\WordPress\Installer\Extension;

use ShineUnited\Conductor\Configuration\Configuration;

/**
 * Callback Extension
 */
class CallbackExtension extends PriorityExtension {
	private mixed $callback;

	/**
	 * Initializes the extension.
	 *
	 * @param callable $callback The callback to generate the extension code.
	 * @param integer  $priority The extension loading priority.
	 */
	public function __construct(callable $callback, int $priority = 50) {
		$this->callback = $callback;

		parent::__construct($priority);
	}

	/**
	 * Get the callback.
	 *
	 * @return callable The callback.
	 */
	public function getCallback(): callable {
		return $this->callback;
	}

	/**
	 * {@inheritDoc}
	 */
	public function generateCode(Configuration $config): string {
		return $config->processCallableValue($this->getCallback());
	}
}
