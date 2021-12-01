<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: ./index.php');
}

$lastName = filter_input(INPUT_POST, 'lastname');
$firstName = filter_input(INPUT_POST, 'firstname');
$tel = filter_input(INPUT_POST, 'tel');
$email = filter_input(INPUT_POST, 'email');
$zip = filter_input(INPUT_POST, 'zip');
$state = filter_input(INPUT_POST, 'state');
$city = filter_input(INPUT_POST, 'city');
$address = filter_input(INPUT_POST, 'address');
$questions = filter_input(INPUT_POST, 'question', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
$date1 = filter_input(INPUT_POST, 'date1');
$date2 = filter_input(INPUT_POST, 'date2');
$message = filter_input(INPUT_POST, 'message');

$_SESSION['contact'] = [
  'lastName' => $lastName,
  'firstName' => $firstName,
  'tel' => $tel,
  'email' => $email,
  'zip' => $zip,
  'state' => $state,
  'city' => $city,
  'address' => $address,
  'questions' => $questions,
  'date1' => $date1,
  'date2' => $date2,
  'message' => $message
];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<link rel="icon" type="image/png" href="./images/favicon.png">
<link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/style.css">
<script src="https://kit.fontawesome.com/f273e6126d.js" crossorigin="anonymous"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body id="index">
<div id="wrapper">

<!-- entryform -->
<section class="">
  <div class="entryform confirm">
      <h2 class="lp-title entryform">お問い合わせ内容確認</h2>
      <div class="main-entryform-001">
      <p class="text-001"></p>
      <form id="entryform" method="post" action="./mail_sent.php">
      <table>
      <tbody>
      <tr>
      <td>お名前 </td>
      <td>
        <dl>
          <dt>姓</dt>
          <dd><?php echo $lastName; ?></dd>
          <dd><input type="hidden" name="lastname" value="<?php echo $lastName; ?>" /></dd>
          <dt>名</dt>
          <dd><?php echo $firstName; ?></dd>
          <dd><input type="hidden" name="firstname" value="<?php echo $firstName; ?>" /></dd>
        </dl>
      </td>
      </tr>
      <!--
      <tr>
      <td>性別 </td><td><label><input type="radio" name="gender" value="男性" checked="checked" /> 男性</label> <label><input type="radio" name="gender" value="女性" /> 女性</label></td>
      </tr>-->
      <tr>
        <td>電話番号 </td>
        <td><input type="hidden" name="tel" value="<?php echo $tel ?>" /><?php echo $tel; ?></td>
      </tr>
      <tr>
        <td>メールアドレス </td>
        <td><input type="hidden" name="email" value="<?php echo $email ?>" /><?php echo $email; ?></td>
      </tr>
      <tr>
        <td>郵便番号 </td>
        <td><input type="hidden" name="zip" id="postcode1" value="<?php echo $zip ?>" /><?php echo $zip; ?></td>
      </tr>
      <tr>
        <td>都道府県 </td>
        <td><input type="hidden" name="state" value="<?php echo $state ?>" /><?php echo $state?></td>
      </tr>
      <tr>
        <td>市区町村・番地 </td>
        <td><input type="hidden" name="city" id="address2" value="<?php echo $city ?>" /><?php echo $city ?></td>
      </tr>
      <tr>
        <td>建物名・部屋番号</td>
        <td><input type="hidden" name="address" value="<?php echo $address ?>" /><?php echo $address ?></td>
      </tr>
      <tr>
        <td>アンケート</td>
        <td>当サイトをどこで知りましたか？<br/>
          <?php foreach ($questions as  $question) : ?>
            <input type="hidden" name="question[]" value="<?php echo $question ?>" /><?php echo $question . " "; ?>
          <?php endforeach; ?>
        </td>
      </tr>
      <tr>
        <td>ご見学希望日</td>
        <td>希望日&#9312; <input name="date1" value="<?php echo $date1 ?>" class="date" type="hidden"  style="width:180px; margin: 8px;" /><?php echo $date1 ?> <br>希望日&#9313; <input name="date2" value="<?php echo $date2 ?>" class="date" type="hidden" style="width:180px; margin: 8px;" /><?php echo $date2 ?></td>
      </tr>
      <tr>
        <td>その他ご要望等</td>
        <td><input type="hidden" name="message" value="<?php echo $message ?>" cols="35" rows="8"><?php echo $message; ?></td>
      </tr>
      </tbody>
      </table>
      <p>ご入力いただきました個人情報等の内容は、厳重に管理いたします。</p>
      <div class="submit"><input type="submit" value="送信する" /></div>
      <p><a href="./index.php">戻る</a></p>
      </form>
      </div>
      </div>
</section>
<!--/wrapper--></div>

</body>
</html>
