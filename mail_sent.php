<?php
require __DIR__ . '/OutputErrorMessage.php';
require __DIR__ . '/SendContactFormUseCase/UseCase/Interactor.php';

session_start();
unset($_SESSION['contact']);

if ($_SERVER['REQUEST_METHOD'] !== "POST") {
    header('Location: ./index.php');
}

/**
 * 以下の規則で変数名を設定。不要なものは設定しなくてもかまいません。
 * lastname : 姓
 * firstname : 名
 * tel : 電話番号
 * email : メールアドレス
 * zip : 郵便番号
 * state : 都道府県
 * city : 市区町村
 * address : 建物名・部屋番号
 * date : 日時
 * message : textarea、テキストエリア
 * from_user : ユーザーのメールアドレスを送信元にする場合はvalue="on"にする
 * send_address : メールの送信先を指定する場合は、この変数にメールアドレスを入れる
 */
$lastName = filter_input(INPUT_POST, 'lastname');
$firstName = filter_input(INPUT_POST, 'firstname');
$tel = filter_input(INPUT_POST, 'tel');
$email = filter_input(INPUT_POST, 'email');
$zip = filter_input(INPUT_POST, 'zip');
$state = filter_input(INPUT_POST, 'state');
$city = filter_input(INPUT_POST, 'city');
$address = filter_input(INPUT_POST, 'address');
$date1 = filter_input(INPUT_POST, 'date1');
$date2 = filter_input(INPUT_POST, 'date2');
$message = filter_input(INPUT_POST, 'message');

/**
 * 必須項目に入力がない場合はメッセージをrequiredItemメソッドから取得している
 * 
 * 正規表現をfilterNameメソッドで行っている
 */
$outputErrorMessage = new OutputErrorMessage($lastName, $firstName, $tel, $email);
$outputErrorMessage->requiredItem();
$outputErrorMessage->filterName();

$input = new Input($lastName, $firstName, $tel, $email, $zip, $state, $city, $address, $date1, $date2, $message);
$interacotr = new Interactor($input);
$interacotr->handler();

?>
