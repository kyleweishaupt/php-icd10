<?php

declare(strict_types=1);

namespace ICD10Parser;

use ICD10Parser\ICD10CodeOrdered;

/**
 * Parser Class
 */
class ICD10Parser
{
	/** @var array<ICD10CodeOrdered> */
	protected static array $results = [];

	private static function parseLine(string $line): ICD10CodeOrdered
	{
		$orderNumber = trim(substr($line, 0, 5));
		$code = trim(substr($line, 6, 7));
		$valid = substr($line, 14, 1);
		$shortDescription = trim(substr($line, 16, 60));
		$longDescription = trim(substr($line, 77, 255));

		return new ICD10CodeOrdered(
			(int) $orderNumber,
			(string) $code,
			(bool) $valid,
			(string) $shortDescription,
			(string) $longDescription
		);
	}

	public static function fromFile(string $filename): self
	{
		if (!file_exists($filename)) {
			throw new \Exception("File not found: $filename");
		}

		$handle = fopen($filename, 'r');
		self::$results = [];
		while (($line = fgets($handle)) !== false) {
			self::$results[] = self::parseLine($line);
		}
		fclose($handle);

		return new static();
	}

	public static function fromString(string $contents): self
	{
		if (empty($contents)) {
			throw new \Exception("No ICD contents provided");
		}

		$separator = "\r\n";
		$line = strtok($contents, $separator);
		self::$results = [];
		while ($line !== false) {
			self::$results[] = self::parseLine($line);

			# do something with $line
			$line = strtok($separator);
		}

		return new static();
	}

	public static function toArray(): array
	{
		return self::$results;
	}
}
