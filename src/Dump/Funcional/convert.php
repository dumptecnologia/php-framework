<?php

if (!function_exists('to_bool')) {
	/**
	 * Convert value to bool
	 */
	function to_bool(mixed $value): bool
	{
		return filter_var($value, FILTER_VALIDATE_BOOLEAN);
	}
}

if (!function_exists('throw_to_array')) {
	/**
	 * Get array from Throwable exception
	 */
	function throw_to_array(Throwable $exception): array
	{
		$rtn = "";
		$count = 0;
		foreach ($exception->getTrace() as $frame) {
			$args = '';
			if (isset($frame['args'])) {
				$args = [];
				foreach ($frame['args'] as $arg) {
					if (is_string($arg)) {
						$args[] = "'".$arg."'";
					} elseif (is_array($arg)) {
						$args[] = 'Array';
					} elseif (is_null($arg)) {
						$args[] = 'NULL';
					} elseif (is_bool($arg)) {
						$args[] = ($arg) ? 'true' : 'false';
					} elseif (is_object($arg)) {
						$args[] = get_class($arg);
					} elseif (is_resource($arg)) {
						$args[] = get_resource_type($arg);
					} else {
						$args[] = $arg;
					}
				}
				$args = implode(', ', $args);
			}
			$rtn .= sprintf(
				"#%s %s(%s): %s%s%s(%s)\n",
				$count,
				$frame['file'] ?? '',
				$frame['line'] ?? '',
				$frame['class'] ?? '',
				$frame['type'] ?? '', // "->" or "::"
				$frame['function'],
				$args
			);
			$count++;
		}

		return [
			'message' => $exception->getMessage(),
			'stacktrace' => explode("\n", $rtn),
		];
	}
}

if (!function_exists('throw_to_string')) {
	/**
	 * Get string from Throwable exception
	 */
	function throw_to_string(Throwable $exception): string
	{
		return sprintf("message: %s\n[stacktrace]\n%s",
			$exception->getMessage(),
			implode("\n", throw_to_array($exception)['stacktrace'])
		);
	}
}