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

if (!function_exists('to_int')) {
	/**
	 * Convert value to int
	 */
	function to_int(mixed $value): int
	{
		return intval($value);
	}
}

if (!function_exists('to_str')) {
	/**
	 * Convert value to str
	 */
	function to_str(mixed $value): string
	{
		return sprintf("%s", filter_var($value) ?: _throw_value_error('string'));
	}
}

if (!function_exists('to_flt')) {
	/**
	 * Convert value to float
	 */
	function to_flt(mixed $value): float
	{
		return floatval($value);
	}
}

if (!function_exists('to_arr')) {
	/**
	 * Convert value to array
	 */
	function to_arr(mixed $value): array
	{
		return getArrayable($value);
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

if (!function_exists('_throw_value_error')) {
	function _throw_value_error(string $type)
	{
		return throw new ValueError(sprintf('the value cannot be converted to %s', $type));
	}
}