<?php
require_once DIRNAME(__FILE__).'/../../../class/common/facebook/facebook.php';
  
$facebook = new Facebook(array(
    'appId' => '212893852188446',
    'secret' => '7cf397a95a972cb60290fd24cd0e89e0',
));
  
$fb_user = $facebook->getUser();
$signed_request = $facebook->getSignedRequest();
$like_status = $signed_request["page"]["liked"];
        if (!$fb_user) {
        $par = array(
          'canvas' => 1,
          'fbconnect' => 0,
          'scope' => 'publish_stream',
          'redirect_uri' => 'http://apps.facebook.com/irimo_kairo');
        $fb_login_url = $facebook->getLoginUrl($par);
  
        echo "<script type='text/javascript'>top.location.href = '$fb_login_url';</script>";
        }
  
      $key = $facebook->getAccessToken();


?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../kairo.css">
</head>

<body>
<div id="main">
<h1>
<a href="/kairo/"><img src="./../../images/kairo/title2.png" alt="論理回路性格診断" border=0></a>
</h1>
<h3>
数学やコンピューターサイエンスで登場する<br>
論理回路を、<br>
人間にあてはめてみました。
</h3>

<br>
<div class="contents">
<table>
<tr><td><img src="../../images/kairo/mascot_and.png"></td><td><div class="serif"><strong>AND</strong><br>
A,B共に1の時のみ、1が出力される。<br>
→みんながやってることが大好き。
</div></td></tr>
<tr><td><img src="../../images/kairo/mascot_nand.png"></td><td><div class="serif"><strong>NAND</strong><br>
A,B共に1の時のみ、0が出力される。<br>
→流行りだすと冷める。

</div></td></tr>
<tr><td><img src="../../images/kairo/mascot_nor.png"></td><td><div class="serif"><strong>NOR</strong><br>
A,B共に0のときのみ、1が出力される。<br>
→独占欲が強い。

</div></td></tr>
<tr><td><img src="../../images/kairo/mascot_not.png"></td><td><div class="serif"><strong>NOT</strong><br>
入力されたビットでないビットが出力される。1→0,0→1<br>
→あまのじゃく。
</div></td></tr>
<tr><td><img src="../../images/kairo/mascot_or.png"></td><td><div class="serif"><strong>OR</strong><br>
A,Bどちらかが1、又は共に1の時のみ、1が出力される。<br>
→他人の話を鵜呑みにする。

</div></td></tr>
<tr><td><img src="../../images/kairo/mascot_xor.png"></td><td><div class="serif"><strong>XOR</strong><br>
AとBが異なっている時、1が出力される。<br>
→他人の仲間割れが快感。

</div></td></tr>
</table>
</div>
<?php
      $user_profile = $facebook->api('/me');
      $name = $user_profile['name'];
?>
<h3>
<strong><?php print $name; ?>さん　はどのタイプ？</strong><br>
20問の質問に答えて、あなたの論理回路を解析してみよう★
</h3>

<form method="POST" action="./../q.php" name="start">
<div id="start">
<submit type="image" onclick="start.submit();" onmouseover='document.start_img.src="../../images/kairo/start_over.png";' onmouseout='document.start_img.src="../../images/kairo/start.png";'><img name="start_img" src="../../images/kairo/start.png" width="300" height="95" alt="スタート"></a>

<input type=hidden name='key' value='<?php print $key; ?>' />
<input type=hidden name='n' value='<?php print $name; ?>' />
</div>
</form>
</div>
<img src="../images/kairo/start_over.png" width="1" height="1">
<font color="#FFFFFF">■ http://mnlab.sakura.ne.jp/kairo/ ■ since 2009.12.17 ■ 問題作成：Rika プログラミング：いりも ■ </font>
</body>
</html>
</body>
</html>