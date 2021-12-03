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

    public function message()
    {
        if ($this->lastName === "" || $this->firstName === "" || $this->tel === "" || $this->email === "") return true;
    }


}