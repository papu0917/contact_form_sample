<?php
session_start();

$lastName = filter_input(INPUT_POST, 'lastname');
$firstName = filter_input(INPUT_POST, 'firstname');
$tel = filter_input(INPUT_POST, 'tel');
$email = filter_input(INPUT_POST, 'email');
$zip = filter_input(INPUT_POST, 'zip');
$state = filter_input(INPUT_POST, 'state');
$city = filter_input(INPUT_POST, 'city');
$address = filter_input(INPUT_POST, 'address');
$questions = filter_input(INPUT_POST, 'question', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
$message = filter_input(INPUT_POST, 'message');

$_SESSION['contact']['lastName'] = $lastName;
$_SESSION['contact']['firstName'] = $firstName;
$_SESSION['contact']['tel'] = $tel;
$_SESSION['contact']['email'] = $email;
$_SESSION['contact']['zip'] = $zip;
$_SESSION['contact']['state'] = $state;
$_SESSION['contact']['city'] = $city;
$_SESSION['contact']['address'] = $address;
$_SESSION['contact']['questions'] = $questions;
$_SESSION['contact']['message'] = $message;



// var_dump($lastName);
// var_dump($firstName);
// var_dump($email);
// var_dump($tel);
// var_dump($zip);
// var_dump($city);
// var_dump($address);
// var_dump($questions);
// var_dump($message);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<link rel="icon" type="image/png" href="./images/favicon.png">
<link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/style.css">
<script src="https://kit.fontawesome.com/f273e6126d.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
<script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
</head>

<body id="index">
<div id="wrapper">



<!-- entryform -->
<section class="">
  <div class="entryform">
      <h2 class="lp-title entryform"></h2>
      <div class="main-entryform-001">
      <p class="text-001">お問い合わせ内容確認</p>
      <form id="entryform" method="post" action="./contact_confirm.php">
      <table>
      <tbody>
      <tr>
      <td>お名前 </td>
      <td>
        <dl>
          <dt>姓</dt>
          <dd><?php echo $lastName; ?></dd>
          <dd><input type="hidden" name="lastname" /></dd>
          <dt>名</dt>
          <dd><?php echo $firstName; ?></dd>
          <dd><input type="hidden" name="firstname" /></dd>
        </dl>
      </td>
      </tr>
      <!--
      <tr>
      <td>性別 </td><td><label><input type="radio" name="gender" value="男性" checked="checked" /> 男性</label> <label><input type="radio" name="gender" value="女性" /> 女性</label></td>
      </tr>-->
      <tr>
        <td>電話番号 </td>
        <td><input type="hidden" name="tel" /><?php echo $tel; ?></td>
      </tr>
      <tr>
        <td>メールアドレス </td>
        <td><input type="hidden" name="email" /><?php echo $email; ?></td>
      </tr>
      <tr>
        <td>郵便番号 </td>
        <td><input type="hidden" name="zip" id="postcode1" /><?php echo $zip; ?></td>
      </tr>
      <tr>
        <td>都道府県 </td>
        <td><input type="hidden" name="state" /><?php echo $state?></td>
      </tr>
      <tr>
        <td>市区町村・番地 </td>
        <td><input type="hidden" name="city" id="address2" /><?php echo $city ?></td>
      </tr>
      <tr>
        <td>建物名・部屋番号</td>
        <td><input type="hidden" name="address" /><?php echo $address ?></td>
      </tr>
      <tr>
        <td>アンケート</td>
        <td>当サイトをどこで知りましたか？<br/>
        <?php foreach ($questions as  $question) : ?>
          <?php echo $question . " "; ?>
          <?php endforeach; ?>
          </td>
        <!-- <label><input type="checkbox" name="question[]" value="現地" /> 現地</label>
        <label><input type="checkbox" name="question[]" value="折込チラシ" /> 折込チラシ</label>
        <label><input type="checkbox" name="question[]" value="ネットの広告" /> ネットの広告</label>
        <label><input type="checkbox" name="question[]" value="検索サイト" /> 検索サイト</label>
        <label><input type="checkbox" name="question[]" value="その他" /> その他</label></td> -->
      </tr>
      <tr>
        <td>その他ご要望等</td>
        <td><input type="hidden" name="message" cols="35" rows="8"><?php echo $message; ?></td>
      </tr>
      </tbody>
      </table>
      <p>ご入力いただきました個人情報等の内容は、厳重に管理いたします。</p>
      <div class="submit"><input type="submit" value="確認する" /></div>
      <p><a href="./contact_form.php">戻る</a></p>
      </form>
      </div>
      </div>
</section>



<!--/wrapper--></div>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>


</body>
</html>
