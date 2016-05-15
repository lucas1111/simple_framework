<?php namespace app;

use fun\HttpCheckRequest;
use fun\myRedis;

//类名与文件名一致
class TelQuery{
	const PHONE_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm';
	const QUERY_PHONE = 'PHONE:INFO:';

	public static function query($phoneNum){
		//var_dump($phoneNum);
		//var_dump(preg_match('/^0?1[3|4|5|7|8][0-9]\d{8}$/', $phoneNum));
		//var_dump(self::checkTel($phoneNum));
		if(self::checkTel($phoneNum)){
			//$subNum = substr($phoneNum, 0, 7);
			$redisKey = sprintf(self::QUERY_PHONE.'%s',substr($phoneNum, 0, 7));
			//var_dump($subNum);
			//var_dump($redisKey);
            $phoneData = myRedis::getRedis()->get($redisKey);
            //var_dump($phoneInfo);
			if(!$phoneData) {
				//var_dump('TelQuery_query');
				//HttpCheckRequest::testRequest();
				//var_dump(HttpCheckRequest::request(self::PHONE_API,['tel'=>$phoneNum]));
				$response = HttpCheckRequest::request(self::PHONE_API,['tel'=>$phoneNum]);
				$phoneInfo = self::formatData($response);
				//var_dump($phoneInfo);
                if ($phoneInfo) {
                    myRedis::getRedis()->set($redisKey, json_encode($phoneInfo));
                }
                $phoneInfo['msg'] = '数据由阿里巴巴API提供';
            } else {
                $phoneInfo = json_decode($phoneData, true);
                $phoneInfo['msg'] = '数据由本地数据库提供';
            }
		}
		//var_dump($phoneInfo);
		return $phoneInfo;
	}

/*格式化手机号查询信息*/	
	public static function formatData($data){
	    $ret = null;
	    if (!empty($data)) {
	        preg_match_all("/(\w+):'([^']+)/", $data, $res);
	        $items = array_combine($res[1], $res[2]);
	        foreach ($items as $itemKey => $itemVal) {
	            $ret[$itemKey] = iconv('GB2312', 'UTF-8', $itemVal);
	        }
	    }
	    return $ret;
	}

/**校验手机号码**/
	public static function checkTel($phoneNum){
		if(preg_match('/^0?1[3|4|5|7|8][0-9]\d{8}$/', $phoneNum)){
			return true;
		}else{
			return false;
		}
	}

	public static function test(){
		TelQuery::query("text中的调用！\n");
		echo "here is test,from app/TelQuery/";
	}

}

/*
正则表达式问号的四种用法详解
原文符号
	因为?在正则表达式中有特殊的含义，所以如果想匹配?本身，则需要转义，\?
有无量词
	问号可以表示重复前面内容的0次或一次，也就是要么不出现，要么出现一次。
非贪婪匹配

贪婪匹配
	在满足匹配时，匹配尽可能长的字符串，默认情况下，采用贪婪匹配
	string pattern1 = @"a.*c";  // greedy match 
	Regex regex = new Regex(pattern1);
	regex.Match("abcabc"); // return "abcabc"

非贪婪匹配
	在满足匹配时，匹配尽可能短的字符串，使用?来表示非贪婪匹配
	string pattern1 = @"a.*?c";  // non-greedy match 
	Regex regex = new Regex(pattern1);
	regex.Match("abcabc"); // return "abc"

几个常用的非贪婪匹配Pattern
	*? 重复任意次，但尽可能少重复
	+? 重复1次或更多次，但尽可能少重复
	?? 重复0次或1次，但尽可能少重复
	{n,m}? 重复n到m次，但尽可能少重复
	{n,}? 重复n次以上，但尽可能少重复

不捕捉模式
	如何关闭圆括号的捕获能力？而只是用它来做分组，方法是在左括号的后边加上:?，这里第一个圆括弧只是用来分组，而不会占用捕获变量，所以$1的内容只能是steak或者burger，而永远不可能是bronto。
while(<>){
  if(/(?:bronto)(steak|burger)/){
    print "Fred wants a $1\n" ;
  }
}
*/