<?php
	
	define('APP_PATH',realpath(dirname(__FILE__)));  //项目定义的位置
	define('DS',DIRECTORY_SEPARATOR);				//适应windos和linux的斜杠   / \ 
	define('STATIC',APP_PATH.DS.'static'.DS);     
	define('LIBS',APP_PATH.DS.'libs'.DS);            //主配置文件夹  核心
	define('VIEWS',APP_PATH.DS.'views'.DS);	 		 //视图
	define('RUNTIME',APP_PATH.DS.'runtime'.DS);		 // 缓存文件

	require(LIBS."AutoLoader.class.php"); // 实现自动加载 
	// 加载配置
	 #print_r(APP_PATH);die();     

	if(new AutoLoader()){
		$router = \libs\Router::getInstance();  // 调用路由类  // 单例模式的调用
		$controller = $router->getCon();		//获取控制器
		//print_r($controller)."</br>";die();
		$action = $router->getAc();				//获取方法 
		if($obj = new $controller){
			$obj->$action();
		}else{
			throw(new Exception('对不起，我们这里没有你说的这个控制器'));
		}

		
	}else{
		echo "MVC文件加载错误!";
	}