<?php

require_once(DIRNAME(__FILE__)."/../conf/conf.php");
require_once(CLASS_DIR."/kairo/COMMON_KAIRO.class.php");
require_once(CLASS_DIR."/common/DBManager.php");

class Result{
	private $_req = array();
	private $_result = array();
	private $_val = array();

	private $mytype;
	private $mytypep;

	public function __construct(){
		$this->setREQUESTParam();
	}
	private function setREQUESTParam(){
		$line = array();
		for($i=0; $i<20; $i++){
			$this->_val[$i] = $_POST["val".$i];
		}
	}
	// グラフ表示の際に使う
	public function getPercent(){
		$db = new DBManager();
		$data = $db->getKairoCount();

		$ret = array();
		$ret = $data;
	}
	// 計算ロジック
	public function getYourType(){
		$i = 0;
		$type_a = COMMON_KAIRO::ARG();
		foreach($this->_val as $key=>$val){
			$type = COMMON_KAIRO::QUESTION_I_ARG($key);
			if(in_array($type,$type_a) === true){	// ダミー回答は弾かれる
				if(isset($this->_result[$type]) === true){
					$this->_result[$type] += $val;
				} else {
					$this->_result[$type] = $val;	// NOTICE弾き
				}
			}
		}
		$max = array();
		$max["type"] = "";
		$max["value"] = 0;
		foreach($this->_result as $key=>$value){
			if($value> $max["value"]){
				$max["type"] = $key;
				$max["value"] = $value;
			}
		}

		$this->mytype = $key;
		$this->mytypep = $value;
		return $max["type"];
	}
	public function myTypeP(){
		return $this->mytypep;
	}
	public function getMyInsiP(){
		$mytype = $this->mytype;
		$result = $this->_result;
		if($mytype === "AND" || $mytype === "OR"){
			$nagasare = $result["AND"] + $result["OR"];
			$nagasare = $nagasare / 2;
			return $nagasare;
		} else {
			$hinekure = $result["NAND"] + $result["XOR"] + $result["NOT"] + $result["NOR"];
			$hinekure = $hinekure / 4;
			return $hinekure;
		}
	}
}
