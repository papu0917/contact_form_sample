<?php

namespace SendContactFormUseCase\UseCase;

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
