<?php
namespace app;

//类名与文件名一致
class TelQuery{
	public static function query($phoneNum){
		var_dump($phoneNum);
	}

	public static function test(){
		TelQuery::query("text中的调用！\n");
		echo "here is test,from app/TelQuery/";
	}

}
