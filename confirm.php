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
$hour1 = filter_input(INPUT_POST, 'hour1');
$date2 = filter_input(INPUT_POST, 'date2');
$hour2 = filter_input(INPUT_POST, 'hour2');
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
  'hour1' => $hour1,
  'date2' => $date2,
  'hour2' => $hour2,
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
  <h2 class="lp-title entryform">来園予約内容確認</h2>
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
            <tr>
              <td>電話番号 </td>
              <td><input type="hidden" name="tel" value="<?php echo $tel; ?>" /><?php echo $tel; ?></td>
            </tr>
            <tr>
              <td>メールアドレス </td>
              <td><input type="hidden" name="email" value="<?php echo $email; ?>" /><?php echo $email; ?></td>
            </tr>
            <tr>
              <td>郵便番号 </td>
              <td><input type="hidden" name="zip" id="postcode1" value="<?php echo $zip; ?>" /><?php echo $zip; ?></td>
            </tr>
            <tr>
              <td>都道府県 </td>
              <td><input type="hidden" name="state" value="<?php echo $state; ?>" /><?php echo $state; ?></td>
            </tr>
            <tr>
              <td>市区町村・番地 </td>
              <td><input type="hidden" name="city" id="address2" value="<?php echo $city; ?>" /><?php echo $city; ?></td>
            </tr>
            <tr>
              <td>建物名・部屋番号</td>
              <td><input type="hidden" name="address" value="<?php echo $address; ?>" /><?php echo $address; ?></td>
            </tr>
            <tr>
              <td>来園希望日</td>
              <td>第1希望日時 <input name="date1" value="<?php echo $date1 . " " . $hour1; ?>" class="date" type="hidden"  style="width:180px; margin: 8px;" /><?php echo $date1 . " " . $hour1; ?>
              <br>第2希望日時 <input name="date2" value="<?php echo $date2 . " " . $hour2; ?>" class="date" type="hidden" style="width:180px; margin: 8px;" /><?php echo $date2 . " " . $hour2; ?></td>
            </tr>
            <tr>
              <td>ご要望等</td>
              <td><input type="hidden" name="message" value="<?php echo $message; ?>" cols="35" rows="8"><?php echo $message; ?></td>
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
