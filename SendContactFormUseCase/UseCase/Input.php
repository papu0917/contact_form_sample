<?php

namespace SendContactFormUseCase\UseCase;

final class Input
{
	private $email;
	private $title;
	private $content;

	public function __construct(string $email, string $title, string $content)
	{
		$this->email = $email;
		$this->title = $title;
		$this->content = $content;
	}

	public function email(): string
	{
		return $this->email;
	}

	public function title(): string
	{
		return $this->title;
	}

	public function content(): string
	{
		return $this->content;
	}
}
