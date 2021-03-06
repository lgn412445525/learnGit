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
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Public/Admin/assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header" style="height:40px">
    <div class="am-topbar-brand">
        <strong><?php echo C('COMPANY_NAME');?></strong> <small>后台管理</small>
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
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="am-offcanvas admin-sidebar" style="width:200px">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list" >
                <li>
                    <a href="<?php echo U('Admin/Index/index');?>">
                        <span class="am-icon-home"></span> 首页
                    </a>
                </li>
                <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><li>
                            <a href="<?php echo U($v['mca']);?>">
                                <span class="am-icon-<?php echo ($n['ico']); ?>"></span> <?php echo ($v['ico']); ?>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="admin-parent">
                            <a class="am-cf" data-am-collapse="{target: '#<?php echo ($v['name']); ?>'}"><span class="am-icon-<?php echo ($v['ico']); ?>"></span> <?php echo ($v['name']); ?> <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                            <ul class="am-list am-collapse admin-sidebar-sub am-in" id="<?php echo ($v['name']); ?>">
                                <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><li><a href="<?php echo U($n['mca']);?>"><span class="am-icon-<?php echo ($n['ico']); ?>"></span> <?php echo ($n['name']); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
    </div>

<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg"><?php echo ($cat["cate_name"]); ?></strong> </div>
        </div>
        <hr>

        <div class="am-g">
            <form role="form" id="form" action="<?php echo U('About/lis',array('id'=>$cat['id']));?>" method="post"
                  enctype="multipart/form-data">
                <fieldset>
                <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
                <input type="hidden" name="cid" value="<?php echo ($cat["id"]); ?>"/>
                <input type="hidden" name="cate_name" value="<?php echo ($cat["cate_name"]); ?>">
                <div class="am-form-group">
                    <label for="doc-ta-1" style="margin-left:1%;">内容:</label>
                    <textarea name="content" id="doc-ta-1" cols="50" rows="5" style="width:80%;height:800px;">
                           <?php echo html_entity_decode($vo['content']);?>
                    </textarea>
                    <!--引入kindeditor编辑器-->
                    <script charset="utf-8" src="/Public/kindeditor/kindeditor.js"></script>
                    <script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
                    <script type="text/javascript">
                        var editor;
                        KindEditor.ready(function(K) {
                            editor = K.create('textarea[name="content"]', {
                                allowFileManager : true,
                                afterBlur : function(){
                                    //编辑器失去焦点时直接同步，可以取到值
                                    this.sync();
                                }
                            });
                        });
                    </script>
                    <!--引入kindeditor编辑器-->
                    <div class="error" style="position:relative;left:485px;top:-25px"></div>
                </div>
                <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
                </fieldset>
            </form>

        </div>
    </div>
</div>


<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2016 AllMobilize, Inc. Licensed under QMTC license.</p>
</footer>
<!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="/Public/Admin/jquery.js"></script>
<script src="/Public/Admin/modernizr.js"></script>
<script src="/Public/Admin/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Public/Admin/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Public/Admin/assets/js/amazeui.min.js"></script>
<script src="/Public/Admin/assets/js/app.js"></script>
</body>
</html>