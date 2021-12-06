<?php

require __DIR__ . '/../ValueObject/FirstName.php';
require __DIR__ . '/../ValueObject/LastName.php';
require __DIR__ . '/../ValueObject/Tel.php';
require __DIR__ . '/../ValueObject/Email.php';
require __DIR__ . '/../ValueObject/Zip.php';
require __DIR__ . '/../ValueObject/State.php';
require __DIR__ . '/../ValueObject/City.php';
require __DIR__ . '/../ValueObject/Address.php';
require __DIR__ . '/../ValueObject/DateOne.php';
require __DIR__ . '/../ValueObject/DateTwo.php';
require __DIR__ . '/../ValueObject/Message.php';

final class SendToUser
{
    private const TITLE = 'お問い合わせありがとうございました。';
    private const FROM_ADDR = "m.morita@daioh-ag.co.jp";
    private const REPLAY_TO = "m.morita@daioh-ag.co.jp";

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
        $this->lastName = $lastName;
        $this->firstName = $firstName;
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
        $sendAddress = $this->email->value();
        $header = "From: ".self::FROM_ADDR."\nReply-To: ".self::REPLAY_TO;
        mb_send_mail($sendAddress, self::TITLE, $sendMessage, $header);
    }

    /**
     * ユーザーに送りたいメッセージを作成する
     */
    public function makeSendMessage(): string
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
{$lastName} {$firstName} 様

この度は、特設サイトより、
資料請求をいただきまして、ありがとうございます。
資料請求の内容を、下記の通り承りました。
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
■IPアドレス：{$_SERVER['REMOTE_ADDR']}
----------------------------------------
このメールは、特設サイトより、
資料請求をいただきました方へ送信しております。

※お返事に暫くお時間をいただく場合がございますので、予めご了承願います。
万が一、一週間以上経ってもお手元に資料が届かない場合は、
誠にお手数ですが、直接お問い合わせいただきますよう、お願いいたします。

この度は、資料請求をいただきまして、ありがとうございました。
EOF;

        return $template;
    }
}
