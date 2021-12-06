<?php

require __DIR__ . '/../ValueObject/FirstName.php';
require __DIR__ . '/../ValueObject/LastName.php';
require __DIR__ . '/../ValueObject/Tel.php';
require __DIR__ . '/../ValueObject/Email.php';
require __DIR__ . '/../ValueObject/Zip.php';
require __DIR__ . '/../ValueObject/State.php';
require __DIR__ . '/../ValueObject/City.php';
require __DIR__ . '/../ValueObject/Address.php';
require __DIR__ . '/../ValueObject/Question.php';
require __DIR__ . '/../ValueObject/DateOne.php';
require __DIR__ . '/../ValueObject/DateTwo.php';
require __DIR__ . '/../ValueObject/Message.php';
// require __DIR__ . '/Output.php';
require __DIR__ . '/../UseCase/SendToUser.php';

final class Interactor
{
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function handler()
    {
        $this->sendToUser();
        return '送信が完了しました';
        // $this->sendToCompany();

        // return new Output(true, '送信が完了しました');
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

    // private function sendToCompany(): void
    // {
    //     $email = new Email($this->input->email());
    //     $title = new Title($this->input->title());
    //     $content = new Content($this->input->content());
    //     $sendToCompany = new SendToCompany($email, $title, $content);
    //     $sendToCompany->handler();
    // }
}
