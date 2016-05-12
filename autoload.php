<?php
  class autoload{
    public static function load($className){
      $formatPath = str_replace('\\','/',$className);
      $filePath = sprintf('%s.php',$formatPath);
      //var_dump($filePath);
      if(is_file($filePath)) require_once $filePath;
    }
  }

  spl_autoload_register("autoload::load");
  //其他写法：
  //spl_autoload_register(['autoload','loadClass'] );
  //spl_autoload_register(array('autoload','loadClass') );

/*
bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] )
autoload_function
    欲注册的自动装载函数。如果没有提供任何参数，则自动注册 autoload 的默认实现函数spl_autoload()。
throw
    此参数设置了 autoload_function 无法成功注册时， spl_autoload_register()是否抛出异常。
prepend
    如果是 true，spl_autoload_register() 会添加函数到队列之首，而不是队列尾部。
将函数注册到SPL __autoload函数队列中。如果该队列中的函数尚未激活，则激活它们。
*/
