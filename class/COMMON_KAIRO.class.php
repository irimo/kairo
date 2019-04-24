<?php

class COMMON_KAIRO{
	public function ARG(){
		return array("AND","NAND","OR","XOR","NOT","NOR");
	}
	public function QUESTION(){
		$ret = array();
		$ret[0] = array("皆がより道するなら一緒についていく。","lt","AND");
		$ret[1] = array("雑誌に載っていると良い物に思えてくる。","lt","AND");
		$ret[2] = array("クラスや集団での行事には乗り気になれない。","gt","AND");
		$ret[3] = array("好きなアーティストがオリコンに入るとファンをやめたくなる。","lt","NAND");
		$ret[4] = array("好きなマンガがアニメ化すると読む気がうせる。","lt","NAND");
		$ret[5] = array("レンタル1位のＤＶＤはつい借りたくなってしまう。","gt","NAND");
		$ret[6] = array("ネットの書き込みによる知識をリアル知人に披露したことがある。","lt","OR");
		$ret[7] = array("みのもんたに言われるとなぜか納得できる。","lt","OR");
		$ret[8] = array("テレビの言うことはまるで信用できない。","gt","OR");
		$ret[9] = array("電車で喧嘩の現場に出くわすと嬉しい。","lt","XOR");
		$ret[10] = array("グループ人間関係における小競り合いにスリルを感じる。","lt","XOR");
		$ret[11] = array("二人の間に入って両方から悪口を聞かされるのは嫌だ。","gt","XOR");
		$ret[12] = array("すすめられると食べる気がしなくなる。","lt","NOT");
		$ret[13] = array("皆が乗り気だと、参加したくなくなる。","lt","NOT");
		$ret[14] = array("「あえて逆を選ぶ」ことはない。","gt","NOT");
		$ret[15] = array("小さい頃おもちゃを貸すのが嫌だった。","lt","NOR");
		$ret[16] = array("誰かと話しているとき割って入られるとイラっとくる。","lt","NOR");
		$ret[17] = array("二人で遊ぶよりも集団で遊ぶほうが好きだ。","gt","NOR");
		$ret[18] = array("島田紳助が嫌いじゃない。","lt","");
		$ret[19] = array("コーヒーはぬるめが好き。","lt","");
		return $ret;
	}
	public function QUESTION_I($i){
		$array = self::QUESTION();
		if(count($array) < $i){
			return null;
		}
		return $array[$i];
	}
	public function QUESTION_I_LTGT($i){
		$line = self::QUESTION_I($i);
		return $line[1];
	}
	public function QUESTION_I_ARG($i){
		$line = self::QUESTION_I($i);
		return $line[2];
	}
	public function RESULT(){
		$ret = array();
		$ret["AND"]  = array("AND","A、B共に1の時のみ、1が出力される。", "みんな1ならボクも1…みんなのやってることが大好きなあなた！");
		$ret["NAND"]= array("NAND","A、B共に1の時のみ、0が出力される。", "周りが1になると突然0になる…流行りだすと冷めるあなた！");
		$ret["OR"]  = array("OR","A、Bどちらかが1、又は共に1の時、1が出力される。", "誰かが1って言ったら自分も1になっちゃう…他人の意見を鵜呑みにするあなた！");
		$ret["XOR"] = array("XOR","AとBが異なっている時、1が出力される。", "二人の仲たがいの時反応して1になる…他人の仲間割れが快感なあなた！");
		$ret["NOT"] = array("NOT","入力されたビットでないビットが出力される。", "言うまでもなく、あまのじゃくなあなた！");
		$ret["NOR"] = array("NOR","A、B共に0の時のみ、1が出力される。", "私だけが1なのっていう…独占欲が強いあなた！");
		return $ret;		
	}
	public function RESULT_I($name){
		$array = self::RESULT();
		if(!isset($array[$name])){
			return null;
		}
		return $array[$name];
	}
}

?>