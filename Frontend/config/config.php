<?php
return array(
    //路由配置
    'router' => array(
        'base_action' => 'index', //默认路由入口
        'base_shell' => 'index', //默认shell入口

        //静态化配置
        'routeRule' => array(
            'manage' => 'user',
            'login' => 'user/login',
            'logout' => 'user/logout',
            'register' => 'user/register',
            'add' => 'token/add',
            'api/display/<token:[\w_]+>' => 'api/display/<token>',
            'api/liveapi/<uperid:[\w_]+>' => 'api/liveapi/<uperid>',
			't/<id:\d+>' => 'token/view/<id>',
			't/e/<tokenid:\d+>' => 'token/edit/<tokenid>',
            't/r/<tokenid:\d+>' => 'token/room/<tokenid>',
			't/d/<tokenid:\d+>' => 'token/delete/<tokenid>',
        ),
    ),

    //自动加载配置
    'autoload' => array(
        'autoPath' => 'config/autoload.php',
        //重新构建间隔时间s
        'autoSkipLoad' => 1,
        'autoThrow' => false, //使用外部autoload机制(如composer) 需设置为false
    ),

    //请求配置
    'request' => array(
        'trueToken' => 'acmate-csrf',
        'csrfToken' => 'csrf-token',
        'csrfPost' => '_csrf',
        'csrfHeader' => 'X-CSRF-TOKEN',

        // 约定userIP字段 X_REAL_IP
        'userIP' => '',
        //强制返回页面协议
        'showTpl' => 'X_SHOW_TEMPLATE',
        //csrf白名单
        'csrfWhiteIps' => array(
            '127.0.0.1/24'
        ),
        // 多语言cookie字段
        'languageCookie' => 'acmate_language'
    ),

    //响应配置
    'response' => array(
        'jsonContentType' => 'application/json',
        //兼容老版本 新版本都用one就可以了
        'paramsType' => 'one',  // one or keys
        // 以下配置在paramsType == one 时有效
        'paramsKey' => 'PRM',
        'objectEncode' => true, //object对象是否转义
    ),

    //日志相关配置
    'logger' => array(
        // 是否记录日志文件
        'files' => true,
        // 自定义日志记录方法
//        'sendLog' => array('Common', 'sendLog'),
        // 自定义日志错误方法
//        'sendError' => array('Common', 'sendError'),
        //错误级别
        'errorLevel' => NOTICE,
        //慢查询阀值
        'slowQuery' => 1000,
        // 日志归档
        'reorganize' => true
    ),

    // 数据库相关配置
    'database' => array(
        'returnIntOrFloat' => true, // 是否返回int或者float类型
        'returnAffectedRows' => false, // 是否返回受影响行数
    ),

    //缓存相关配置
    'cache' => array(
        'pkCache' => 'acmate:%s',
        'session' => array(
            'save_handler'=>'files',  //files redis memcache
            'maxlifetime' => 86400,    //过期时间s
            'cookie_lifetime' => 86400 // cookie session_id过期时间s
        ),
        // 开启redis自动序列化存储
        'serialize' => true,
    ),

    //异常配置
    'exception' => array(
        //返回页面
        'exceptionTpl' => 'error/exception',
        'errorTpl' => 'error/msg',

        'messages' => array(
            500 => '网站有一个异常，请稍候再试',
            404 => '您访问的页面不存在',
            403 => '权限不足，无法访问'
        )
    ),



);