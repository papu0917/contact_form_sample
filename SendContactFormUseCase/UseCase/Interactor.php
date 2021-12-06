<?php
require __DIR__ . '/../UseCase/Input.php';
require __DIR__ . '/../UseCase/SendToUser.php';
require __DIR__ . '/../UseCase/SendToCompany.php';

final class Interactor
{
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function handler(): void
    {
        $this->sendToUser();
        $this->sendToCompany();
    }

    private function sendToUser(): void
    {
        $lastName = new LastName($this->input->lastName());
        $firstName = new FirstName($this->input->firstName());
        $tel = new Tel($this->input->tel());
        $email = new Email($this->input->email());
        $zip = new Zip($this->input->zip());
        $state = new State($this->input->state());
        $city = new City($this->input->city());
        $address = new Address($this->input->address());
        $date1 = new DateOne($this->input->date1());
        $date2 = new DateTwo($this->input->date2());
        $message = new Message($this->input->message());

        $sendToUser = new SendToUser(
            $lastName,
            $firstName,
            $tel,
            $email,
            $zip,
            $state,
            $city,
            $address,
            $date1,
            $date2,
            $message
        );
        $sendToUser->handler();
    }

    private function sendToCompany(): void
    {

        $lastName = new LastName($this->input->lastName());
        $firstName = new FirstName($this->input->firstName());
        $tel = new Tel($this->input->tel());
        $email = new Email($this->input->email());
        $zip = new Zip($this->input->zip());
        $state = new State($this->input->state());
        $city = new City($this->input->city());
        $address = new Address($this->input->address());
        $date1 = new DateOne($this->input->date1());
        $date2 = new DateTwo($this->input->date2());
        $message = new Message($this->input->message());

        $sendToUser = new SendToCompany(
            $lastName,
            $firstName,
            $tel,
            $email,
            $zip,
            $state,
            $city,
            $address,
            $date1,
            $date2,
            $message
        );
        $sendToUser->handler();
    }
}
