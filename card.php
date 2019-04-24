<?php
require_once(DIRNAME(__FILE__)."/../../conf/conf.php");



$line1 = intval($_GET["p1"]);
$line2 = intval($_GET["p2"]);
if(isset($_GET["n"]) && strlen($_GET["n"]) > 0)	$name = $_GET["n"];	else $name = "名無し";
if(isset($_GET["c"]) && strlen($_GET["c"]) > 0)	$card = $_GET["c"];	else $card = "and";

$line1 = $line1*100;
$line2 = $line2*10;

$size = 24;

$param = $line1+$line2;
$param *= $param;
$param + 1234567;
$param %= 7;
$param += 1;

$imgdir = CLASS_DIR."/kairo/card_base";
$imgpath = $imgdir . "/".$card.$param.".png";
$img = imagecreatefrompng($imgpath);


$len1 = strlen($line1);
switch($len1){
	case 4:
		$x1 = 230;
		break;
	case 3:
		$x1 = 245;
		break;
	default:
		$x1 = 275;
		break;
}
$y1 = 428;


$len2 = strlen($line2);
switch($len2){
	case 3:
		$x2 = 245;
		break;
	case 2:
		$x2 = 260;
		break;
	default:
		$x2 = 275;
		break;
}
$y2 = 455;

$maxlen = 20;
if(mb_strlen($name) > $maxlen){
	$name = mb_substr($name,0,$maxlen);
}

$work = imagecreatetruecolor(1,1);
$color = imagecolorallocate($work ,0,0,0);
if($color !== false){
	ImageTTFText($img, $size."px", 0, $x1, $y1, $color, BIN_DIR."/MSMINCHO.TTC",$line1);
	ImageTTFText($img, $size."px", 0, $x2, $y2, $color, BIN_DIR."/MSMINCHO.TTC",$line2);
	ImageTTFText($img, "8px", 0, 149, 489, $color, BIN_DIR."/MSMINCHO.TTC","http://mnlab.sakura.ne.jp/kairo/");
	ImageTTFText($img, "10px", 0, 20, 25, $color, BIN_DIR."/MSMINCHO.TTC",$name."さんの論理回路");
}

header("Content-type:image/png");
imagepng($img);
?>
