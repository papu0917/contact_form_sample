<?php

final class ContactInfo
{
	private $email;
	private $title;
	private $content;

	public function __construct(Email $email, Title $title, Content $content)
	{
		$this->email = $email;
		$this->title = $title;
		$this->content = $content;
	}

	public function email(): Email
	{
		return $this->email;
	}

	public function title(): Title
	{
		return $this->title;
	}

	public function content(): Content
	{
		return $this->content;
	}
}
