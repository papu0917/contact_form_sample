<?php

final class SendToCompany
{
	private const COMPANY_EMAIL = 'hoge@example.com';

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
		$title = $this->makeTitle();
		mb_send_mail(self::COMPANY_EMAIL, $title, $sendMessage);
	}

	private function makeTitle(): string
	{
		return 'お問い合わせがありました';
	}

	/**
	 * ゆざに送りたいメッセじを作成する
	 *
	 * @return void
	 */
	private function makeSendMessage(): string
	{
		$email = $this->email->value();
		$title = $this->title->value();
		$content = $this->content->value();
		// sprintfとかを使ってもOK
		$template = <<<EOF
			以下のお客様からのお問い合わせがありました.

			Email
			{$email}

			タイトル
			{$title}

			お問い合わせ内容
			{$content}
EOF;

		return $template;
	}
}
