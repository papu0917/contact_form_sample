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

use SendContactFormUseCase\UseCase\Input;
use SendContactFormUseCase\UseCase\Output;

final class Interactor
{
    private $input;

    public function __construct(Input $input)
    {
        $this->input = $input;
    }

    public function handler(): Output
    {
        $this->sendToUser();
        $this->sendToCompany();

        return new Output(true, '送信が完了しました');
    }

    private function sendToUser(): void
    {
        $email = new Email($this->input->email());
        $title = new Title($this->input->title());
        $content = new Content($this->input->content());
        $sendToUser = new SendToUser($email, $title, $content);
        $sendToUser->handler();
    }

    private function sendToCompany(): void
    {
        $email = new Email($this->input->email());
        $title = new Title($this->input->title());
        $content = new Content($this->input->content());
        $sendToCompany = new SendToCompany($email, $title, $content);
        $sendToCompany->handler();
    }
}
