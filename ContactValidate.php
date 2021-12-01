<?php

session_start();
require_once(__DIR__ . '/ContactInputError.php');

final class contactValidate
{
    private $firstName;
    private $lastName;
    private $tel;
    private $email;
    private $zip;
    private $state;
    private $city;

    public function __construnct(
        string $firstName,
        string $lastName,
        string $tel,
        string $email,
        string $zip,
        string $state,
        string $city
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->tel = $tel;
        $this->email = $email;
        $this->zip = $zip;
        $this->$state = $state;
        $this->city = $city;
    }

    public function message(): ContactInputError
    {
        $firstNameErrorMessage = empty($this->firstName)
            ? "姓を入力してください"
            : null;
        $lastNameErrorMessage = empty($this->lastName)
            ? "名を入力してください"
            : null;
        $telErrorMessage = empty($this->tel)
            ? "電話番号を入力してください"
            : null;
        $emailErrorMessage = empty($this->email)
            ? "メールアドレスを入力してください"
            : null;
        $zipErrorMessage = empty($this->zip)
            ? "郵便番号をを入力してください"
            : null;
        $stateErrorMessage = empty($this->state)
            ? "都道府県を入力してください"
            : null;
        $cityErrorMessage = empty($this->city)
            ? "市区町村・番地を入力してください"
            : null;
        
        return new ContactInputError(
            $firstNameErrorMessage,
            $lastNameErrorMessage,
            $telErrorMessage,
            $emailErrorMessage,
            $zipErrorMessage,
            $stateErrorMessage,
            $cityErrorMessage
        );
    }
}