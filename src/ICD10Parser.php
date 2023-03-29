<?php

declare(strict_types=1);

namespace ICD10Parser;

use ICD10Parser\ICD10CodeOrdered;

/**
 * Parser Class
 */
class ICD10Parser
{
	public static function parse(string $filename): array
	{
		if (!file_exists($filename)) {
			throw new \Exception("File not found: $filename");
		}

		$handle = fopen($filename, 'r');
		$codes = [];
		while (($line = fgets($handle)) !== false) {
			$orderNumber = trim(substr($line, 0, 5));
			$code = trim(substr($line, 6, 7));
			$valid = substr($line, 14, 1);
			$shortDescription = trim(substr($line, 16, 60));
			$longDescription = trim(substr($line, 77, 255));

			$codes[] = new ICD10CodeOrdered(
				(int) $orderNumber,
				(string) $code,
				(bool) $valid,
				(string) $shortDescription,
				(string) $longDescription
			);
		}
		fclose($handle);

		return $codes;
	}
}
