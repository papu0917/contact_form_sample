<?php

final class SendToUser
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

	public function handler(): void
	{
		$sendMessage = $this->makeSendMessage();
		mb_send_mail($this->email->value(), $this->title->value(), $sendMessage);
	}

	/**
	 * ゆざに送りたいメッセじを作成する
	 *
	 * @return void
	 */
	private function makeSendMessage(): string
	{
		$content = $this->content->value();
		// sprintfとかを使ってもOK
		$template = <<<EOF
			お問い合わせいただきありがとうございます.

			お問い合わせ内容
			{$content}
EOF;

		return $template;
	}
}
