<?php

final class Input
{
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
        string $lastName,
        string $firstName,
        string $tel,
        string $email,
        string $zip,
        string $state,
        string $city,
        string $address,
        string $date1,
        string $date2,
        string $message
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

    public function lastName(): string
    {
        return $this->lastName;
    }

    public function firstName(): string
    {
        return $this->firstName();
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

    public function address(): string
    {
        return $this->address;
    }

    public function date1(): string
    {
        return $this->date1;
    }

    public function date2(): string
    {
        return $this->date2;
    }

    public function message(): string
    {
        return $this->message;
    }
}
