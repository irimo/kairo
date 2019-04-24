<?php

require_once(DIRNAME(__FILE__)."/conf/conf.php");
require_once(CLASS_DIR."/UTILS.class.php");
require_once(CLASS_DIR."/COMMON_KAIRO.class.php");
require_once(COMMON_CLASS_DIR."/common/escape.php");
require_once(SMARTY_H);

$q_count = 20;

if(isset($_POST["key"])){
	$key = $_POST["key"];
}

if(!isset($_GET["page"]) || intval($_GET["page"]) === 1){
	$question_no_string = UTILS::RAND_ARRAY_STRING($q_count);	// assign
	$page = 1;
} elseif(intval($_GET["page"]) === 0) {
	exit();
} else {
	$question_no_string = $_POST["question_no_string"];	// escape
	$question_no_string = html($question_no_string);
	$page = intval($_GET["page"]);
}
$question_no_array = split(",",$question_no_string);
$q_no = $question_no_array[$page-1];
$now_q_array = COMMON_KAIRO::QUESTION_I($q_no);
$now_q = $now_q_array[0];
$now_ltgt = $now_q_array[1];
$now_arg = $now_q_array[2];

$vals = array();
for($i=0; $i<$q_count; $i++){
	$val = intval($_POST["val".$i]);
	$vals[$i] = $val;
}
if($page < $q_count){
	$nextpage = "q.php?page=".($page+1);
} else {
	$nextpage = "a.php";
}

$smarty = new Smarty();
$smarty->assign("nextpage",$nextpage);
$smarty->assign("question_no_string",$question_no_string);
$smarty->assign("now_q",$now_q);
$smarty->assign("page",$page);
$smarty->assign("q_no",$q_no);
$smarty->assign("vals",$vals);
$smarty->assign("key",$key);
$smarty->assign("now_ltgt",$now_ltgt);
if(isset($_POST["n"])){
	$name = $_POST["n"];
} elseif(isset($_GET["n"])){
	$name = $_GET["n"];
}
$smarty->assign("n",html($name));	// escape
$smarty->display("kairo/q.html");
?>
