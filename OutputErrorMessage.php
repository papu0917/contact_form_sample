<?php

final class OutputErrorMessage
{
    private $firstName;
    private $lastName;
    private $tel;
    private $email;

    public function __construct(string $firstName, string $lastName, string $tel, string $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->tel = $tel;
        $this->email = $email;
    }

    /**
     * message
     *
     *
     */
    public function requiredItem()
    {
        if ($this->lastName === "" || $this->firstName === "" || $this->tel === "" || $this->email === "") {
            echo 'お名前、電話番号、メールアドレスをご確認ください';
            die;
        }
    }
    
    /**
     * filterName
     *
     * 
     */
    public function filterName()
    {
        if (!preg_match("/^([^\x01-\x7E]+)$/", $this->lastName) || !preg_match("/^([^\x01-\x7E]+)$/", $this->firstName)) {
            header("Content-Type: text/html; charset=UTF-8");
            echo "姓名に全角以外の文字が入力されています。";
            die;
        }
    }


}