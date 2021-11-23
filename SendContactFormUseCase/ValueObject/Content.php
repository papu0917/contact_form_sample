<?php

final class Content
{
	private $value;

	public function __construct(string $value)
	{
		$this->value = $value;
	}

	public function value(): string
	{
		return $this->value;
	}
}
