<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'               =>  'Mysql',     // 数据库类型
   'DB_HOST'               =>  'rm-2ze5tk92q950i5ju3o.mysql.rds.aliyuncs.com', // 服务器地址
    'DB_NAME'               =>  'youle',          // 数据库名
    'DB_USER'               =>  'wangmeng',      // 用户名
    'DB_PWD'                =>  'rnMXxIKSjDy9H$^',         // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'table_',    // 数据库表前缀

	'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
	'APP_SUB_DOMAIN_RULES'    =>  array(   
		 
		'test.v8c9.com'  => 'Home',  // admin.domain1.com域名指向Admin模块
		),
	// 允许访问的模块列表
	'MODULE_ALLOW_LIST'    =>    array('Home','Test'),
	'DEFAULT_MODULE'       =>    'Home',  // 默认模块
	'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
	'DEFAULT_ACTION'        =>  'index', // 默认操作名称

	'AUTOLOAD_NAMESPACE' => array(
		'OSS' => VENDOR_PATH.'OSS',//阿里oss
		 ),  

	'OSS' => array(
			'ACCESS_KEY_ID' =>'LTAIPySvcHISnPmv', //从OSS获得的AccessKeyId
			'ACCESS_KEY_SECRET' =>'qGjW90O8ygeTD5hIMcGVQvqRQ99tlG' , //从OSS获得的AccessKeySecret
			'ENDPOINT' =>'oss-cn-shanghai.aliyuncs.com', //您选定的OSS数据中心访问域名，例如oss-cn-hangzhou.aliyuncs.com
		),

	'URL_MODEL'=>2,//采用rewrite兼容模式,并且修改
	// 'VAR_PATHINFO'=> 's',// 重写时我们用的是s=""的形式.
	
	// 'SHOW_PAGE_TRACE'        =>true,   // 显示页面Trace信息


	// 'LOG_RECORD' => true, // 开启日志记录
	// 'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
	// 
	
	"OSS_DOMAIN"         => 'http://shihai.oss-cn-beijing.aliyuncs.com/', //

	// 图片访问地址

	'YOULE_APP' =>'http://file.oneweone.cn//ule_v1.2.0.apk',
	'LOG_RECORD' => true, // 开启日志记录
);