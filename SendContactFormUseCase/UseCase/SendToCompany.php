<?php

final class SendToCompany
{
    private const COMPANY_EMAIL = 'm.morita@daioh-ag.co.jp';

    private $lastName;
    private $firstName;
    private $tel;
    private $email;
    private $zip;
    private $state;
    private $city;
    private $address;
    private $date1;
    private $date2;
    private $message;

    public function __construct(
        LastName $lastName,
        FirstName $firstName,
        Tel $tel,
        Email $email, 
        Zip $zip,
        State $state,
        City $city,
        Address $address,
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
        $this->state = $state;
        $this->city = $city;
        $this->address = $address;
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
     * @return
     */
    private function makeSendMessage(): string
    {

        $lastName = $this->lastName->value();
        $firstName = $this->firstName->value();
        $tel = $this->tel->value();
        $email = $this->email->value();
        $zip = $this->zip->value();
        $state = $this->state->value();
        $city = $this->city->value();
        $address = $this->address->value();
        $date1 = $this->date1->value();
        $date2 = $this->date2->value();
        $message = $this->message->value();
$template = <<<EOF

以下のお客様からのお問い合わせがありました。

----------------------------------------
■お名前（姓）: {$lastName}
■お名前（名）: {$firstName}
■お電話番号 : {$tel}
■メールアドレス : {$email}
■郵便番号 : {$zip}
■都道府県 : {$state}
■市区町村・番地 : {$city}
■建物名・部屋番号 : {$address}
■第1希望日時 : {$date1}
■第2希望日時 : {$date2}
■ご要望等
{$message}
EOF;

        return $template;
    }
}
