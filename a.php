<?php
require_once(DIRNAME(__FILE__)."/../../conf/conf.php");
require_once(CLASS_DIR."/kairo/Result.class.php");
require_once(CLASS_DIR."/kairo/db_common_class.php");
require_once(CLASS_DIR."/common/escape.php");
require_once(SMARTY_H);

$smarty = new Smarty();
$result_class = new Result();
//$percent_array = $result_class->getPercent();
$type = $result_class->getYourType();
$smarty->assign("type",$type);
$type = strtolower($type);
$insip = $result_class->getMyInsiP();
$typep = $result_class->myTypeP();
$key = $_POST["key"];
$name = html($_POST["n"]);//////////escape
//echo "<img src='./card.php?p1=".$insip."&p2=".$typep."&n=".$name."&c=".strtolower($type)."'>";

if(strlen($name) <= 0)	$name = "名無し";

$smarty->assign("p1",$insip);
$smarty->assign("p2",$typep);
$smarty->assign("n",$name);
$smarty->assign("c",$type);
$smarty->assign("key",$key);
$smarty->display("kairo/a.html");

$db = new db_common_class();
$ipaddr = html($_SERVER["REMOTE_ADDR"]);
$ret = $db->set($name, $type, $ipaddr);
if($ret === false){
	echo "DBError!";
}

?>