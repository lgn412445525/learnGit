<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/Public/Admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/Admin/assets/css/admin.css">
    <link rel="stylesheet" href="/Public/Fileupload/control/css/zyUpload.css" type="text/css">
    <link rel="stylesheet" href="/Public/Fileupload/zyPopup/css/zyPopup.css" type="text/css">
    <link rel="stylesheet" href="/Public/Fileupload/jcrop_zh/css/jquery.Jcrop.css" type="text/css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI</strong> <small>后台管理模板</small>
    </div>

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="<?php echo U('Admin/Index/index');?>"><span class="am-icon-home"></span> 首页</a></li>
                <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><li><a href="<?php echo U($v['mca']);?>"><span class="am-icon-pencil-square-o"></span> <?php echo ($v['name']); ?></a></li>
                        <?php else: ?>
                        <li class="admin-parent">
                            <a class="am-cf" data-am-collapse="{target: '#<?php echo ($v['name']); ?>'}"><span class="am-icon-file"></span> <?php echo ($v['name']); ?> <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                            <ul class="am-list am-collapse admin-sidebar-sub am-in" id="<?php echo ($v['name']); ?>">
                                <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li><a href="<?php echo U($n['mca']);?>"><span class="am-icon-calendar"></span> <?php echo ($n['name']); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
    </div>



    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Banner上传</strong> </div>
            </div>
            <hr>

            <div class="am-u-sm-8">
                <script src="/Public/Fileupload/jquery-1.7.2.js"></script>
                <script type="text/javascript" src="/Public/Fileupload/jquery-1.7.2.js"></script>
                <!-- 引用核心层插件 -->
                <script type="text/javascript" src="/Public/Fileupload/core/zyFile.js"></script>
                <!-- 引用控制层插件 -->
                <script type="text/javascript" src="/Public/Fileupload/control/js/zyUpload.js"></script>
                <!-- 引用初始化JS -->
                <script type="text/javascript" src="/Public/Fileupload/jquery.json-2.4.js"></script>
                <script type="text/javascript" src="/Public/Fileupload/demo.js"></script>
                <script type="text/javascript" src="/Public/Fileupload/zyPopup/js/zyPopup.js"></script>

                <script type="text/javascript" src="/Public/Fileupload/jcrop_zh/js/jquery.Jcrop.js"></script>
                <div id="demo" class="demo"></div>
            </div>



        </div>
        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2016 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>
    </div>
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<!--<script src="/Public/Admin/jquery.js"></script>-->
<!--<script src="/Public/Admin/modernizr.js"></script>-->
<!--<script src="/Public/Admin/assets/js/amazeui.ie8polyfill.min.js"></script>-->
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->

<!--<![endif]-->
<!--<script src="/Public/Admin/assets/js/amazeui.min.js"></script>-->
<!--<script src="/Public/Admin/assets/js/app.js"></script>-->
</body>
</html>