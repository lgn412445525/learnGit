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
    <link rel="icon" type="image/png" href="/layui/Public/Admin/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/layui/Public/Admin/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/layui/Public/Admin/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/layui/Public/Admin/assets/css/admin.css">
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
    <!-- sidebar end -->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right"><?php echo ($pageNum["zip"]); ?></span>
                    <h5>访客</h5>
                </div>
                <div class="ibox-content">
                    <table style="width:300px;">
                        <tr>
                            <td><?php echo ($today); ?></td>
                            <td><?php echo ($yesterday); ?></td>
                            <td><?php echo ($total); ?></td>
                        </tr>
                        <tr>
                            <th>今日</th>
                            <th>昨日</th>
                            <th>总浏览</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <tbody>
                        <tr>
                            <td>系统类型及版本号:</td>
                            <td><?php echo php_uname(); ?></td>
                        </tr>
                        <tr>
                            <td>Web服务器:</td>
                            <td><?php echo $_SERVER["SERVER_SOFTWARE"]; ?></td>
                        </tr>
                        <tr>
                            <td>PHP版本:</td>
                            <td><?php echo PHP_VERSION; ?></td>
                        </tr>
                        <tr>
                            <td>MySQL版本:</td>
                            <td>
                                <?php
 mysql_connect('localhost','root','root'); echo mysql_get_server_info(); ?>
                            </td>
                        </tr>

                        <tr>
                            <td>服务器时间:</td>
                            <td><?php echo date("Y年m月d日 H:i:s",time()); ?></td>
                        </tr>

                        <tr>
                            <td>服务器IP:</td>
                            <td><?php echo GetHostByName($_SERVER['SERVER_NAME']); ?></td>
                        </tr>

                        <tr>
                            <td>服务器域名（主机名）:</td>
                            <td>
                                <?php echo $_SERVER["HTTP_HOST"]; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>服务器语言:</td>
                            <td><?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?></td>
                        </tr>
                        <tr>
                            <td>服务器Web端口:</td>
                            <td><?php echo $_SERVER['SERVER_PORT']; ?></td>
                        </tr>
                        <tr>
                            <td>请求页面时通信协议的名称和版本:</td>
                            <td><?php echo $_SERVER['SERVER_PROTOCOL']; ?></td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="/layui/Public/Admin/jquery.js"></script>
<script src="/layui/Public/Admin/modernizr.js"></script>
<script src="/layui/Public/Admin/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/layui/Public/Admin/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/layui/Public/Admin/assets/js/amazeui.min.js"></script>
<script src="/layui/Public/Admin/assets/js/app.js"></script>
</body>
</html>