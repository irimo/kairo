<?php

class UTILS{
	public function RAND_ARRAY($count){
		$ret_array = array();
		do{
			$i = rand(0,$count-1);
			if(in_array($i,$ret_array) === false){
				$ret_array[] = $i;
			}
		}while(count($ret_array) < $count);

		return $ret_array;
	}
	public function RAND_ARRAY_STRING($count){
		$array = self::RAND_ARRAY($count);
		$ret_string = "";
		foreach($array as $val){
			$ret_string .= $val.",";
		}
		return $ret_string;
	}
}

?>
