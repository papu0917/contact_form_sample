<?php

final class InputNameValidate
{
    private $lastName;
    private $firstName;

    public function __construct(string $lastName, string $firstName)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
    }

    public function filterName(): void
    {
        if (!preg_match("/^([^\x01-\x7E]+)$/", $this->lastName) || !preg_match("/^([^\x01-\x7E]+)$/", $this->firstName)) {
            header("Content-Type: text/html; charset=UTF-8");
            echo "姓名に全角以外の文字が入力されています。";
            die;
        }
    }
}