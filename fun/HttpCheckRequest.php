<?php namespace fun;

class HttpCheckRequest{
	public static function request($url , $params = [] , $method = 'GET'){
		$res = null;
		//$pattern = '/^http.*\/([a-zA-Z0-9_.]+)\.(\w+)\?(.*)$/isU';
		$pattern = "/^(http|https)\:\/\/(\w+\.\w+\.\w+)/";
		if(preg_match($pattern, $url)){
			$method = strtoupper($method);
			if ($method == 'POST') {
				exit('nothing to do.');
			} elseif ($method == 'PUT') {
				exit('nothing to do.');
			} elseif ($method == 'HEAD') {
				exit('nothing to do.');
			} elseif ($method == 'TRACE') {
				exit('nothing to do.');
			} elseif ($method == 'DELETE') {
				exit('nothing to do.');
			} elseif ($method == 'OPTIONS') {
				exit('nothing to do.');
			} elseif ($method == 'CONNECT') {
				exit('nothing to do.');
		} else {
				//exit('method->GET.');
				if ($params) {
					if (strripos('?', $url)) {
						$url = $url . '&' . http_build_query($params);
					} else {
						$url = $url . '?' . http_build_query($params);
					}
				}
				//var_dump($url);
				$res = file_get_contents($url);
			}
		}
		//return $url;
		return $res;
	}

	public static function testRequset(){
		var_dump('from htttrequset!');
	}
}

/*
GET      对服务器资源的简单请求
HEAD     类似于get请求，只不过返回的响应中没有具体的内容，用于获取报头
POST     用于发送包含用户提交数据的请求
PUT      传说当前请求文档的一个版本
DELETE   发送一个用来删除指定文档的请求
TRACE    发送请求的一个副本，以跟踪其处理进程
OPTIONS  返回所有可用的方法；可检查服务器支持哪些方法
CONNECT  用于ssl隧道的基于代理的请求


strripos — 计算指定字符串在目标字符串中最后一次出现的位置（不区分大小写）
说明 ¶
int strripos ( string $haystack , string $needle [, int $offset = 0 ] )
以不区分大小写的方式查找指定字符串在目标字符串中最后一次出现的位置。与 strrpos() 不同，strripos() 不区分大小写。
参数 ¶
haystack
    在此字符串中进行查找。
needle
    注意 needle 可以是一个单字符或者多字符的字符串。
offset
    参数 offset 可以被指定来查找字符串中任意长度的子字符串。
    负数偏移量将使得查找从字符串的起始位置开始，到 offset 位置为止。
返回值 ¶
返回 needle 相对于 haystack 字符串的位置(和搜索的方向和偏移量无关)。同时注意字符串的起始位置为 0 而非 1。
如果 needle 未被发现，返回 FALSE。 
Warning
此函数可能返回布尔值 FALSE，但也可能返回等同于 FALSE 的非布尔值。



http_build_query -- 生成 url-encoded 之后的请求字符串描述string 
http_build_query ( array formdata [, string numeric_prefix] )
	使用给出的关联（或下标）数组生成一个 url-encoded 请求字符串。
	参数 formdata 可以是数组或包含属性的对象。
	一个 formdata 数组可以是简单的一维结构，也可以是由数组组成的数组（其依次可以包含其它数组）。
	如果在基础数组中使用了数字下标同时给出了 numeric_prefix 参数，此参数值将会作为基础数组中的数字下标元素的前缀。
	这是为了让 PHP 或其它 CGI 程序在稍后对数据进行解码时获取合法的变量名。

例子 1. http_build_query() 使用示例
$data = array('foo'=>'bar',
              'baz'=>'boom',
              'cow'=>'milk',
              'php'=>'hypertext processor');
echo http_build_query($data);
// 输出：
//      foo=bar&baz=boom&cow=milk&php=hypertext+processor


*/