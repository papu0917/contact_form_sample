<?php
/* 以下の規則でフォームのパラメータ名を設定。不要なものは設定しなくてもかまいません。
	name : 名前
	lastname : 姓
	firstname : 名
	gender : 性別
	tel : 電話番号
	email : メールアドレス
	zip : 郵便番号
	state : 都道府県
	city : 市区町村
	address : 建物名・部屋番号
	message : textarea、テキストエリア
	from_user : ユーザーのメールアドレスを送信元にする場合はvalue="on"にする
	send_address : メールの送信先を指定する場合は、この変数にメールアドレスを入れる
*/

//正規表現マッチ
if(!preg_match("/^([^\x01-\x7E]+)$/",$_POST['lastname'])||!preg_match("/^([^\x01-\x7E]+)$/",$_POST['firstname'])){
header("Content-Type: text/html; charset=UTF-8");
echo "姓名に全角以外の文字が入力されています。";
exit;
}

//文字コードの設定
	mb_language("ja"); 
	mb_internal_encoding("UTF-8"); 

//送信先・タイトルの設定
	$mail_subject = "【株式会社和光】小江戸聖地霊園 資料請求メール";
	$send_address = "info@koedoseichi.com,".$_POST['email'];

/*
	if(isset($send_address) && preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._\-\+])*@([a-zA-Z0-9_\-])+([a-zA-Z0-9\._\-]+)+$/", $send_address)){
		$to_addr = $send_address;
	} else {
		$to_addr = "info@小江戸聖地霊園";
	}
*/


//送信元・返信先の設定
	if(isset($_POST['from_user']) && $_POST['from_user'] == "on" && isset($_POST['email'])){
		$from_addr = $_POST['email'];
		$reply_to = $_POST['email'];
	} else {
		$from_addr = "info@koedoseichi.com";
		$reply_to = "info@koedoseichi.com";
	}
	$header = "From: ".$from_addr."\nReply-To: ".$reply_to;
/*
ここまで使用環境に合わせて適切に設定してください
*/


	$mail_body = "";
	if($_SERVER['REQUEST_METHOD'] == "POST"){
		extract($_POST);
		$mail_body .= $name.$lastname." ".$firstname."様\n\nこの度は、「小江戸聖地霊園」和光特設サイトより、\n資料請求をいただきまして、ありがとうございます。\n資料請求の内容を、下記の通り承りました。\n\n---------------------------------------------\n";
		if(isset($name)) $mail_body .= "■お名前 : ".$name."\n";
		if(isset($lastname)) $mail_body .= "■お名前（姓） : ".$lastname."\n";
		if(isset($firstname)) $mail_body .= "■お名前（名） : ".$firstname."\n";
		if(isset($gender)) $mail_body .= "■性別 : ".$gender."\n";
		if(isset($tel)) $mail_body .= "■お電話番号 : ".$tel."\n";
		if(isset($email)) $mail_body .= "■メールアドレス : ".$email."\n";
		if(isset($zip)) $mail_body .= "■郵便番号 : ".$zip."\n";
		if(isset($state)) $mail_body .= "■都道府県 : ".$state."\n";
		if(isset($city)) $mail_body .= "■市区町村・番地 : ".$city."\n";
		if(isset($address)) $mail_body .= "■建物名・部屋番号 : ".$address."\n";
		if(isset($question))
			$mail_body .= "■アンケート : ";
			for( $i = 0; $i < count( $question ); $i++)
			$mail_body .= "・".$question[$i]." ";
			$mail_body .= "\n";
		if(isset($message))
			$mail_body .= "■その他ご要望等\n". preg_replace("/\r\n/", "\n", $message) ."\n\n";
		$mail_body .= "■IPアドレス：".$_SERVER['REMOTE_ADDR']."\n---------------------------------------------\n\n";
		$mail_body .= "このメールは、「小江戸聖地霊園」和光特設サイトより、\n資料請求をいただきました方へ送信しております。\n\n※お返事に暫くお時間をいただく場合がございますので、予めご了承願います。\n万が一、一週間以上経ってもお手元に資料が届かない場合は、\n誠にお手数ですが、直接お問い合わせいただきますよう、お願いいたします。\n\nこの度は、資料請求をいただきまして、ありがとうございました。\n\n==============================\n株式会社和光「小江戸聖地霊園」和光特設サイト\nhttps://www.koedoseichi.com/\n==============================";
		$mail_body = mb_convert_encoding($mail_body,"ISO-2022-JP-MS","UTF-8");

if(mb_send_mail($send_address, $mail_subject, $mail_body, $header)){
header('Location: ./thanks.html');
exit;
} else {
header('Location: ./senderror.html');
exit;
}

	}


?>