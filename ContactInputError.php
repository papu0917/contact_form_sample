<?php

final class ContactInputError
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

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function tel(): string
    {
        return $this->tel;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function zip(): string
    {
        return $this->zip;
    }

    public function state(): string
    {
        return $this->state;
    }

    public function city(): string
    {
        return $this->city;
    }
}
