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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">权限管理</strong> </div>
        </div>
        <br>
        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6" >
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a type="button" id="add" class="am-btn am-btn-default" data-am-modal="{target: '#nav-modal', closeViaDimmer: 0, width: 450, height: 270}">
                            <span class="am-icon-plus"></span> 新增
                        </a>
                        <button type="submit" class="am-btn am-btn-default"><span class="am-icon-save"></span> 排序</button>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12" >
                <table id="nav-table" class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th width="25%">权限名</th>
                        <th width="40%">权限</th>
                        <th width="35%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($rule)): foreach($rule as $key=>$v): ?><tr>
                            <td><b><?php echo ($v['_name']); ?></b></td>
                            <td><b><?php echo ($v['name']); ?></b></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary son" navid="<?php echo ($v['id']); ?>" data-am-modal="{target: '#nav-modal', closeViaDimmer: 0, width: 450, height: 280}">
                                            <span class="am-icon-pencil-square-o" ></span> 添加子菜单
                                        </a>
                                        <a class="am-btn am-btn-default am-btn-xs am-hide-sm-only edit" navid="<?php echo ($v['id']); ?>" data-am-modal="{target: '#nav-modal', closeViaDimmer: 0, width: 450, height: 280}">
                                            <span class="am-icon-copy" ></span> 编辑
                                        </a>
                                        <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only del" href="javascript:if(confirm('确定删除？'))location='<?php echo U('Admin/Rule/delete',array('id'=>$v['id']));?>'">
                                            <span class="am-icon-trash-o"></span> 删除
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!--添加编辑菜单-->
        <div class="am-modal am-modal-no-btn" tabindex="-1" id="nav-modal">
            <div class="am-modal-dialog">
                <div class="am-modal-hd" style="margin-bottom:10px;">
                    <strong class="am-text-primary am-text-lg">添加-编辑菜单</strong>
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                </div>
                <div class="am-modal-bd">
                    <form class="am-form am-form-horizontal" id="form-with-tooltip" action="<?php echo U('Admin/Nav/add');?>" method="post" >
                        <fieldset>
                            <div class="am-form-group">
                                <label for="nav-name" class="am-u-sm-3 am-form-label">权限名:</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="nav-name" name="name" placeholder="输入菜单名" minlength="1" required/>
                                </div>
                            </div>

                            <input type="hidden" name="pid" value="0">
                            <input type="hidden" name="id">
                            <div class="am-form-group">
                                <label for="nav-link" class="am-u-sm-3 am-form-label">权限:</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="nav-link" name="mca" placeholder="输入连接" required/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-12">
                                    <button type="submit" class="am-btn am-btn-primary">保存</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="admin-content-footer">
    <hr>
    <p class="am-padding-left">© 2016 AllMobilize, Inc. Licensed under MIT license.</p>
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


<script>

    $("#add").click(function(){
        $('#nav-name,#nav-ico,#nav-link').val('');
        $("input[name='pid']").val(0);
    });

    $(".son").click(function(){
        var pid = $(this).attr('navId');
        $('#nav-name,#nav-ico,#nav-link').val('');
        $("input[name='pid']").val(pid);
    });

    $(".edit").click(function(){
        var id = $(this).attr('navid');
        $.ajax({
            type:'post',
            url:"<?php echo U('Admin/Nav/ajax_edit');?>",
            data:'id='+id,
            dataType:'json',
            success:function(json){
                $("input[name='id']").val(json.id);
                $("#nav-name").val(json.name);
                $("#nav-ico").val(json.ico);
                $("#nav-link").val(json.mca);
                $("input[name='pid']").val(json.pid);
            }
        });
    });

    $(function() {
        var $form = $('#form-with-tooltip');
        var $tooltip = $('<div id="vld-tooltip">提示信息！</div>');
        $tooltip.appendTo(document.body);

        $form.validator();

        var validator = $form.data('amui.validator');

        $form.on('focusin focusout', '.am-form-error input', function(e) {
            if (e.type === 'focusin') {
                var $this = $(this);
                var offset = $this.offset();
                var msg = $this.data('foolishMsg') || validator.getValidationMessage($this.data('validity'));

                $tooltip.text(msg).show().css({
                    left: offset.left + 10,
                    top: offset.top + $(this).outerHeight() + 10
                });
            } else {
                $tooltip.hide();
            }
        });
    });



</script>

<style>
    #vld-tooltip {
        position: absolute;
        z-index: 1000;
        padding: 5px 10px;
        background: #F37B1D;
        min-width: 150px;
        color: #fff;
        transition: all 0.15s;
        box-shadow: 0 0 5px rgba(0,0,0,.15);
        display: none;
    }

    #vld-tooltip:before {
        position: absolute;
        top: -8px;
        left: 50%;
        width: 0;
        height: 0;
        margin-left: -8px;
        content: "";
        border-width: 0 8px 8px;
        border-color: transparent transparent #F37B1D;
        border-style: none inset solid;
    }
</style>