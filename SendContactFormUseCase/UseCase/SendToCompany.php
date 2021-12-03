<?php

final class SendToCompany
{
    private const COMPANY_EMAIL = 'm.morita@daioh-ag.co.jp';

    private $firstName;
    private $lastName;
    private $tel;
    private $email;
    private $zip;
    private $state;
    private $city;
    private $address;
    private $questions;
    private $date1;
    private $date2;
    private $message;

    public function __construct(
        FirstName $firstName,
        LastName $lastName,
        Tel $tel,
        Email $email, 
        zip $zip,
        State $state,
        City $city,
        Address $address,
        Question $questions,
        DateOne $date1,
        DateTwo $date2,
        Message $message
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->tel = $tel;
        $this->email = $email;
        $this->zip = $zip;
        $this->$state = $state;
        $this->city = $city;
        $this->address = $address;
        $this->questions = $questions;
        $this->date1 = $date1;
        $this->date2 = $date2;
        $this->message = $message;
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
     * お問い合わせが来たときのメッセージを作成する
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
