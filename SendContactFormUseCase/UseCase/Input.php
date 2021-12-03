<?php

final class Input
{
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
        string $firstName,
        string $lastName,
        string $tel,
        string $email,
        string $zip,
        string $state,
        string $city,
        string $address,
        array $questions,
        string $date1,
        string $date2,
        string $message
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

    public function address(): string
    {
        return $this->address;
    }

    public function questions(): array
    {
        return $this->questions;
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
