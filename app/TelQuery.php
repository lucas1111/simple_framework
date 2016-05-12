<?php
namespace app;

//类名与文件名一致
class TelQuery{
	public static function query($phoneNum){
		var_dump(self::checkTel($phoneNum));
	}

	public static function checkTel($phoneNum = null){
		$res = false;
		if($phoneNum){
			if(preg_match('/^1[34578]{1}\d{9}/', $phoneNum))
				$res = true;
		}
		return $res;
	}

	public static function test(){
		TelQuery::query("text中的调用！\n");
		echo "here is test,from app/TelQuery/";
	}

}
