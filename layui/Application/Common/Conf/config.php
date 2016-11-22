<?php
return array(
//*************************************附加设置***********************************

    'URL_CASE_INSENSITIVE'   => false,                           // url区分大小写
    'TAGLIB_BUILD_IN'        => 'Cx,Common\Tag\My',              // 加载自定义标签
    'LOAD_EXT_CONFIG'        => 'db',                            // 加载网站设置文件

//***********************************URL设置**************************************

//  'MODULE_ALLOW_LIST'      => array('Home','Admin','Api','User','App'), //允许访问列表
    'URL_HTML_SUFFIX'        => '',  // URL伪静态后缀设置
    'URL_MODEL'              => 2,  //启用rewrite

//***********************************SESSION设置**********************************

//    'SESSION_OPTIONS'        => array(
//        'name'               => 'BJYADMIN',//设置session名
//        'expire'             => 24*3600*15, //SESSION保存15天
//        'use_trans_sid'      => 1,//跨页传递
//        'use_only_cookies'   => 0,//是否只开启基于cookies的session的会话方式
//    ),

//***********************************页面设置**************************************

);
