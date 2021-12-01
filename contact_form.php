<?php
session_start();

/**
 *都道府県をforeachで表示するために配列にした 
 */
$stateList = [
  '1'=>'北海道', '2'=>'青森県', '3'=>'岩手県', 
  '4'=>'宮城県', '5'=>'秋田県','6'=>'山形県', '7'=>'福島県', '8'=>'茨城県', 
  '9'=>'栃木県', '10'=>'群馬県','11'=>'埼玉県', '12'=>'千葉県', '13'=>'東京都', 
  '14'=>'神奈川県', '15'=>'新潟県','16'=>'富山県', '17'=>'石川県', '18'=>'福井県', 
  '19'=>'山梨県', '20'=>'長野県','21'=>'岐阜県', '22'=>'静岡県', '23'=>'愛知県', 
  '24'=>'三重県', '25'=>'滋賀県','26'=>'京都府', '27'=>'大阪府', '28'=>'兵庫県', 
  '29'=>'奈良県', '30'=>'和歌山県','31'=>'鳥取県', '32'=>'島根県', '33'=>'岡山県', 
  '34'=>'広島県', '35'=>'山口県','36'=>'徳島県', '37'=>'香川県', '38'=>'愛媛県', 
  '39'=>'高知県', '40'=>'福岡県','41'=>'佐賀県', '42'=>'長崎県', '43'=>'熊本県', 
  '44'=>'大分県', '45'=>'宮崎県','46'=>'鹿児島県', '47'=>'沖縄県'
];

/**
 * チェックボックスの内容がセッションの情報と合っているかをif文でチェックしている
 */
foreach ($_SESSION['contact']['questions'] as $question) {
  if ($question === '現地') {
    $question1 = 'checked';
  }
  if ($question === '折込チラシ') {
    $question2 = 'checked';
  }
  if ($question === 'ネットの広告') {
    $question3 = 'checked';
  }
  if ($question === '検索サイト') {
    $question4 = 'checked';
  }
  if ($question === 'その他') {
    $question5 = 'checked';
  }
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<link rel="icon" type="image/png" href="./images/favicon.png">
<link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="./css/pikaday.css" type="text/css" media="all" />
<script src="https://kit.fontawesome.com/f273e6126d.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="./js/jquery.validate.js"></script>
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

<script type="text/javascript">
$(window).ready(function() {
var picker = new Pikaday({
    field: document.getElementById('datepicker'),
    minDate: new Date(),
    format: 'D/M/YYYY',
    toString(date, format) {
        // you should do formatting based on the passed format,
        // but we will just return 'D/M/YYYY' for simplicity
        const day = date.getDate();
        const month = date.getMonth() + 1;
        const year = date.getFullYear();
        return `${year}年 ${month}月${day}日`;
    },
    parse(dateString, format) {
        // dateString is the result of `toString` method
        const parts = dateString.split('/');
        const day = parseInt(parts[0], 10);
        const month = parseInt(parts[1], 10) - 1;
        const year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
});
});
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
        <?php
          foreach ($stateList as $state) {
            if ($state == $_SESSION["contact"]['state']) {
              echo "<option value='$state' selected>".$state."</option>";
            } else {
              echo "<option value='$state'>".$state."</option>";
            }
          }
        ?>
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
          <label><input type="checkbox" name="question[]" value="現地" <?php echo $question1 ?>/>現地</label>
          <label><input type="checkbox" name="question[]" value="折込チラシ" <?php echo $question2 ?>/> 折込チラシ</label>
          <label><input type="checkbox" name="question[]" value="ネットの広告" <?php echo $question3 ?>/> ネットの広告</label>
          <label><input type="checkbox" name="question[]" value="検索サイト" <?php echo $question4 ?>/> 検索サイト</label>
          <label><input type="checkbox" name="question[]" value="その他" <?php echo $question5 ?>/> その他</label>
        </td>
      </tr>
      <tr>
        <td>ご見学希望日</td>
        <td>第2希望日までご入力ください。
          <br>希望日&#9312; 
            <input name="date1" class="date" type="text" placeholder="日付を選択してください" value="<?php if (!empty($_SESSION["contact"]["date1"])) echo $_SESSION["contact"]["date1"]; ?>" style="width:180px; margin: 8px;" /> 
          <br>希望日&#9313; 
            <input name="date2" class="date" type="text" placeholder="日付を選択してください" value="<?php if (!empty($_SESSION["contact"]["date2"])) echo $_SESSION["contact"]["date2"]; ?>" style="width:180px; margin: 8px;" />
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

<!-- jQueryUI DatePicker -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>
<script>
  $(".date").datepicker({
  dateFormat: 'yy/mm/dd',
  minDate: '0d'
  }
  );
</script>


</body>
</html>
