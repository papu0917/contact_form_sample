<?php
session_start();
// unset($_SESSION['contact']);

$loop = count($_SESSION["contact"]["questions"]);
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
<!-- <script type="text/javascript" src="./js/jquery.validate.js"></script> -->
<script type="text/javascript" src="//jpostal-1006.appspot.com/jquery.jpostal.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script type="text/javascript">
  $1112 = $.noConflict(true);
</script>
<script type="text/javascript">
  $1112(window).ready( function() {
    $1112('#postcode1').jpostal({
      postcode : [
        '#postcode1'
      ],
      address : {
        '#address1'  : '%3',
        '#address2'  : '%4%5'
      }
    });
  });
</script>

<script>
  $1112(function() {
  $1112("#entryform").validate({
  rules: {
  lastname :{
  required: true,
  CustomValidateUserName: true
  },
  firstname :{
  required: true,
  CustomValidateUserName: true
  },
  kana :{
  required: true,
  CustomValidateUserName: true
  },
  tel :{
  required: true
  },
  email :{
  required: true,
  email: true
  },
  zip :{
  required: true
  },
  city :{
  required: true
  }
  },
  messages: {
  lastname :{
  required: "姓を入力してください"
  },
  firstname :{
  required: "名を入力してください"
  },
  kana :{
  required: "カナを入力してください"
  },
  tel :{
  required: "電話番号を入力してください"
  },
  email :{
  required: "メールアドレスを入力してください",
  email: "正しいメールアドレスを入力してください"
  },
  zip :{
  required: "郵便番号を入力してください"
  },
  city :{
  required: "市区町村・番地を入力してください"
  }
  }
  });
  jQuery.validator.addMethod(
    "CustomValidateUserName",
    function(val,elem){
      reg = new RegExp("^[^\x01-\x7E]+$");
      return this.optional(elem) || reg.test(val);
    },
    "全角で入力してください"
  );
  })
</script>
</head>


<body id="index">
<div id="wrapper">


<!-- entryform -->
<section class="">
  <div class="entryform">
      <h2 class="lp-title entryform">資料請求はこちらから!</h2>
      <div class="main-entryform-001">
      <p class="text-001">無料で詳しい資料を送付いたします。<br>下記のフォームに必要事項をご入力の上、最後に送信ボタンを押してください。<br>後日、お客様へ詳しいご案内資料をさしあげます。</p>
      <form id="entryform" method="post" action="./contact_confirm.php">
      <table>
      <tbody>
      <tr>
      <td>お名前 <span>必須</span></td>
      <td>
        <dl>
          <dt>姓</dt>
          <dd><input type="text" name="lastname" value="<?php if (!empty($_SESSION["contact"]["lastName"])) echo $_SESSION["contact"]["lastName"] ?>" style="width:180px;" /></dd>
          <dt>名</dt>
          <dd><input type="text" name="firstname" value="<?php if (!empty($_SESSION["contact"]["firstName"])) echo $_SESSION["contact"]["firstName"] ?>" style="width:180px;" /></dd>
        </dl>
      </td>
      </tr>
      <!--
      <tr>
      <td>性別 <span>必須</span></td><td><label><input type="radio" name="gender" value="男性" checked="checked" /> 男性</label> <label><input type="radio" name="gender" value="女性" /> 女性</label></td>
      </tr>-->
      <tr>
      <td>電話番号 <span>必須</span></td>
      <td><input type="tel" name="tel" value="<?php if (!empty($_SESSION["contact"]["tel"])) echo $_SESSION["contact"]["tel"] ?>"/></td>
      </tr>
      <tr>
      <td>メールアドレス <span>必須</span></td>
      <td><input type="email" name="email" value="<?php if (!empty($_SESSION["contact"]["email"])) echo $_SESSION["contact"]["email"] ?>" /></td>
      </tr>
      <tr>
      <td>郵便番号 <span>必須</span></td>
      <td><input type="text" name="zip" id="postcode1"  value="<?php if (!empty($_SESSION["contact"]["zip"])) echo $_SESSION["contact"]["zip"] ?>"/></td>
      </tr>
      <tr>
      <td>都道府県 <span>必須</span></td>
      <td>
        <select name="state" id="address1">
          <option value="北海道">北海道</option>
          <option value="青森県">青森県</option>
          <option value="岩手県">岩手県</option>
          <option value="宮城県">宮城県</option>
          <option value="秋田県">秋田県</option>
          <option value="山形県">山形県</option>
          <option value="福島県">福島県</option>
          <option value="茨城県">茨城県</option>
          <option value="栃木県">栃木県</option>
          <option value="群馬県">群馬県</option>
          <option value="埼玉県">埼玉県</option>
          <option value="千葉県">千葉県</option>
          <option value="東京都">東京都</option>
          <option value="神奈川県">神奈川県</option>
          <option value="新潟県">新潟県</option>
          <option value="富山県">富山県</option>
          <option value="石川県">石川県</option>
          <option value="福井県">福井県</option>
          <option value="山梨県">山梨県</option>
          <option value="長野県">長野県</option>
          <option value="岐阜県">岐阜県</option>
          <option value="静岡県">静岡県</option>
          <option value="愛知県">愛知県</option>
          <option value="三重県">三重県</option>
          <option value="滋賀県">滋賀県</option>
          <option value="京都府">京都府</option>
          <option value="大阪府">大阪府</option>
          <option value="兵庫県">兵庫県</option>
          <option value="奈良県">奈良県</option>
          <option value="和歌山県">和歌山県</option>
          <option value="鳥取県">鳥取県</option>
          <option value="島根県">島根県</option>
          <option value="岡山県">岡山県</option>
          <option value="広島県">広島県</option>
          <option value="山口県">山口県</option>
          <option value="徳島県">徳島県</option>
          <option value="香川県">香川県</option>
          <option value="愛媛県">愛媛県</option>
          <option value="高知県">高知県</option>
          <option value="福岡県">福岡県</option>
          <option value="佐賀県">佐賀県</option>
          <option value="長崎県">長崎県</option>
          <option value="熊本県">熊本県</option>
          <option value="大分県">大分県</option>
          <option value="宮崎県">宮崎県</option>
          <option value="鹿児島県">鹿児島県</option>
          <option value="沖縄県">沖縄県</option>
        </select>
      </td>
      </tr>
      <tr>
      <td>市区町村・番地 <span>必須</span></td>
      <td><input type="text" name="city" id="address2"  value="<?php if (!empty($_SESSION["contact"]["city"])) echo $_SESSION["contact"]["city"] ?>"/></td>
      </tr>
      <tr>
      <td>建物名・部屋番号</td><td><input type="text" name="address" value="<?php if (!empty($_SESSION["contact"]["address"])) echo $_SESSION["contact"]["address"] ?>"/></td>
      </tr>
      <tr>
      <td>アンケート</td>
      <td>当サイトをどこで知りましたか？<br>
        <label><input type="checkbox" name="question[]" value="現地" <?php if ($_SESSION["contact"]["questions"] == "現地") echo 'checked="checked"'; ?>/> 現地</label>
        <label><input type="checkbox" name="question[]" value="折込チラシ" <?php if ($_SESSION["contact"]["questions"] == "折込チラシ") echo 'checked="checked"'; ?>/>  折込チラシ</label>
        <label><input type="checkbox" name="question[]" value="ネットの広告" <?php if ($_SESSION["contact"]["questions"] == "ネットの広告") echo 'checked="checked"'; ?>/> ネットの広告</label>
        <label><input type="checkbox" name="question[]" value="検索サイト" /> 検索サイト</label>
        <label><input type="checkbox" name="question[]" value="その他" /> その他</label>
      </td>
      </tr>
      <tr>
      <td>その他ご要望等</td>
      <td><textarea name="message" cols="35" rows="8" ><?php if (!empty($_SESSION["contact"]["message"])) echo $_SESSION["contact"]["message"]; ?></textarea></td>
      
      </tr>
      </tbody>
      </table>
      <p>ご入力いただきました個人情報等の内容は、厳重に管理いたします。</p>
      <div class="submit"><input type="submit" value="確認する" /></div>
      </form>
      </div>
      </div>
</section>



</section>
</main>




<!--/wrapper--></div>

<!--jQuery-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/script.js"></script>


</body>
</html>
