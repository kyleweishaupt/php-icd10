<?php

declare(strict_types=1);

namespace ICD10Parser;

class ICD10CodeOrdered
{
	public int $order;
	public string $code;
	public bool $valid;
	public string $shortDescription;
	public string $longDescription;

	public function __construct(int $order, string $code, bool $valid, string $shortDescription, string $longDescription)
	{
		$this->order = $order;
		$this->code = $code;
		$this->valid = $valid;
		$this->shortDescription = $shortDescription;
		$this->longDescription = $longDescription;
	}

	public function codeFormatted(): string
	{
		if (strlen($this->code) <= 3) {
			return $this->code;
		}

		return substr($this->code, 0, 3) . '.' . substr($this->code, 3);
	}
}
