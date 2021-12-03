<?php
require __DIR__ . '/OutputErrorMessage.php';
require __DIR__ . '/InputNameValidate.php';
require __DIR__ . '/SendContactFormUseCase/UseCase/Input.php';
require __DIR__ . '/SendContactFormUseCase/UseCase/SendToUser.php';

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
 * 必須項目に入力がない場合はメッセージを表示させる
 */
$outputErrorMessage = new OutputErrorMessage($firstName, $lastName, $tel, $email);
$outputErrorMessage->requiredItem();


/**
 * 正規表現マッチ
 */
// if (!preg_match("/^([^\x01-\x7E]+)$/", $firstName) || !preg_match("/^([^\x01-\x7E]+)$/", $lastName)) {
//     header("Content-Type: text/html; charset=UTF-8");
//     echo "姓名に全角以外の文字が入力されています。";
//     die;
// }

$outputErrorMessage->filterName();


/**
 * 文字コードの設定 
 */
// mb_language("ja"); 
// mb_internal_encoding("UTF-8"); 

/**
 * 送信先・タイトルの設定
 */
// $mail_subject = "メール送信テスト";
// $send_address = "m.morita@daioh-ag.co.jp," . $email;

/**
 * 送信元・返信先の設定
 */
// if(isset($_POST['from_user']) && $_POST['from_user'] == "on" && isset($email)){
//     $from_addr = $email;
//     $reply_to = $email;
// } else {
//     $from_addr = "m.morita@daioh-ag.co.jp";
//     $reply_to = "m.morita@daioh-ag.co.jp";
// }
// $header = "From: ".$from_addr."\nReply-To: ".$reply_to;

$sendToUser = new SendToUser($lastName, $firstName, $tel, $email, $zip, $state, $city, $address, $date1, $date2, $message);
$template = $sendToUser->makeSendMessage();
echo($template);
die;


/**
 * ここまで使用環境に合わせて適切に設定してください
 */
// $template = <<<EOF
// {$lastName} {$firstName} 様

// この度は、特設サイトより、
// 資料請求をいただきまして、ありがとうございます。
// 資料請求の内容を、下記の通り承りました。

// ----------------------------------------
// ■お名前（姓）: {$lastName}
// ■お名前（名）: {$firstName}
// ■お電話番号 : {$tel}
// ■メールアドレス : {$email}
// ■郵便番号 : {$zip}
// ■都道府県 : {$state}
// ■市区町村・番地 : {$city}
// ■建物名・部屋番号 : {$address}
// ■第1希望日時 : {$date1}
// ■第2希望日時 : {$date2}
// ■ご要望等
// {$message}
// ■IPアドレス：{$_SERVER['REMOTE_ADDR']}
// ----------------------------------------
// このメールは、特設サイトより、
// 資料請求をいただきました方へ送信しております。

// ※お返事に暫くお時間をいただく場合がございますので、予めご了承願います。
// 万が一、一週間以上経ってもお手元に資料が届かない場合は、
// 誠にお手数ですが、直接お問い合わせいただきますよう、お願いいたします。

// この度は、資料請求をいただきまして、ありがとうございました。
// EOF;

$template = mb_convert_encoding($template,"ISO-2022-JP-MS","UTF-8");
if (mb_send_mail($send_address, $mail_subject, $template, $header)) {
    header('Location: ./thanks.html');
    die;
} else {
    header('Location: ./senderror.html');
    die;
}
?>
