<?php
$message=isset($_POST['message']) ? htmlspecialchars($_POST['message']) : "";
$picture=isset($_POST['picture']) ? htmlspecialchars($_POST['picture']) : "";
$key=isset($_POST['key']) ? htmlspecialchars($_POST['key']) : "";
  
if($message != "" && $picture != "" && $key != ""){
require_once DIRNAME(__FILE__).'/../../../class/common/facebook/facebook.php';

  
   $facebook = new Facebook(array(
    'appId' => '212893852188446',
    'secret' => '7cf397a95a972cb60290fd24cd0e89e0',
   ));
  
  $user = $facebook->getUser();
  
  if ($user) {
    try{
       $facebook->api('/me/feed', 'POST', array(
          'message' => $message,
          'picture' => $picture,
          'link' => "http://apps.facebook.com/irimo_kairo",
          'access_token' => $key,
        ));
     } catch (Exception $e){
        error_log($e);
     }
  }
}
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
<a href="/kairo/"><img src="./../../images/kairo/title2.png" alt="論理回路性格診断" border="0"></a>
</h1>
<h3>
ウォールに投稿しました。<br />
診断＆シェアしていただいて、ありがとうございました！！
</h3>
<div style="height:200px;"></div>
<a href="http://mnlab.sakura.ne.jp/kairo/">http://mnlab.sakura.ne.jp/kairo/</a>
</div>
<font color="#FFFFFF">since 2009.12.17 ■ facebook版 2013.2.27 ■ 問題作成：Rika プログラミング：<a href="http://irimo.cc/">いりも</a> ■ </font>
</body>
</body>
</html>