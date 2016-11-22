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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">栏目管理</strong> </div>
        </div>
        <hr>

        <div class="am-g">

            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" id="cat-add" data-am-modal="{target: '#cat-modal', closeViaDimmer: 0, width: 350, height: 500}"><span class="am-icon-plus"></span> 新增</button>
                        <a href="<?php echo U('Category/catLis');?>" class="am-btn am-btn-default"><span class="am-icon-archive"></span> 排序</a>
                    </div>
                </div>
            </div>

            <div class="am-u-sm-12">
                <table class="am-table am-table-bd am-table-striped admin-content-table">
                    <thead>
                    <tr>
                        <th width="5%">排序</th>
                        <th width="45%">栏目名称</th>
                        <th width="20%">模块名称</th>
                        <th width="10%">是否显示</th>
                        <th width="10%">是否导航</th>
                        <th width="10%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($dlist)): foreach($dlist as $k=>$vo): if($vo['model_name'] != Self): ?><tr class="gradeU" clas="<?php echo ($vo['level']); ?>"
                                style="<?php if($vo["level"] > 0): ?>display:none<?php endif; ?>">
                                <td class="jz">
                                    <input type='text' class='sortn' value="<?php echo ($vo["sort_num"]); ?>" pid="<?php echo ($vo["id"]); ?>" size='3' />
                                </td>
                                <td class="col-sm-5" style="cursor:pointer;">
                                    <?php echo (str_repeat("&nbsp;&nbsp;",$vo['level']*2)); ?>
                                    <img class='add' src="/Public/Admin/img/btn_jia.gif"/>
                                    <b>&nbsp;<?php echo ($vo["cate_name"]); ?></b>
                                </td>

                                <td class="jz col-sm-1">
                                <span class="text-info">
                                    <?php if($vo["model_name"] == 'Active'): ?>列表模块
                                    <?php elseif($vo["model_name"] == 'About'): ?>单编辑模块
                                        <?php elseif($vo["model_name"] == 'Teacher'): ?>老师列表模块<?php endif; ?>
                                </span>
                                </td>

                                <td class="jz xs col-sm-1"  mid="<?php echo ($vo["id"]); ?>">
                                    <?php if($vo['is_show'] == 1): ?><img src="/Public/Admin/img/true.png" xs="1" /><?php else: ?>
                                        <img src="/Public/Admin/img/error.png" xs="0" /><?php endif; ?>
                                </td>
                                <td class="jz dh col-sm-1" mid="<?php echo ($vo["id"]); ?>">
                                    <?php if($vo['is_nav'] == 1): ?><img src="/Public/Admin/img/true.png" xs="1" /><?php else: ?>
                                        <img src="/Public/Admin/img/error.png" xs="0" /><?php endif; ?>
                                </td>

                                <td class="jz col-sm-4">
                                    <div class="am-dropdown" data-am-dropdown>
                                        <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                                        <ul class="am-dropdown-content" id="cat-list">
                                            <li>
                                                <a href="<?php echo U($vo['model_url'],array('cid'=>$vo['id']));?>">
                                                    1. 内容管理
                                                </a>
                                            </li>
                                            <li>
                                                <a catId="<?php echo ($vo['id']); ?>" class="cat-son" data-am-modal="{target: '#cat-modal', closeViaDimmer: 0, width: 350, height: 500}">
                                                    2. 添加子类
                                                </a>
                                            </li>
                                            <li><a catId="<?php echo ($vo['id']); ?>" class="cat-edit" data-am-modal="{target: '#cat-modal', closeViaDimmer: 0, width: 350, height: 500}">3. 编辑</a></li>
                                            <li>
                                                <a class="cat-del" catId="<?php echo ($vo['id']); ?>" data-am-modal="{target: '#my-alert'}">
                                                    4. 删除
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr><?php endif; endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--添加编辑菜单-->
        <div class="am-modal am-modal-no-btn" tabindex="-1" id="cat-modal">
            <div class="am-modal-dialog">
                <div class="am-modal-hd">
                    <legend>添加-编辑栏目</legend>
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                </div>
                <div class="am-modal-bd">
                    <form action="<?php echo U('Admin/Category/catAdd');?>" class="am-form" id="form-with-tooltip" method="post" data-am-validator enctype="multipart/form-data">
                            <input type="hidden" name="id">
                            <input type="hidden" name="pid">
                            <div class="am-form-group">
                                <label for="cat-name">栏目名称：</label>
                                <input type="text" id="cat-name" minlength="2" name="cate_name"
                                       placeholder="输入栏目名称（至少 2 个字符）" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="model_name">模块名称</label>
                                <select id="model_name" name="model_name" required>
                                    <option value="">--请选择--</option>
                                    <option value="Active">文章模块</option>
                                    <option value="About">单编辑页模块</option>
                                </select>
                                <span class="am-form-caret"></span>
                            </div>

                            <div class="am-form-group">
                                <label>是否显示： </label>
                                <label class="am-radio-inline">
                                    <input type="radio" value="1" show="1" name="is_show" required> 是
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" value="0" show="0" name="is_show"> 否
                                </label>
                            </div>

                            <div class="am-form-group">
                                <label>是否导航： </label>
                                <label class="am-radio-inline">
                                    <input type="radio" value="1" nav="1" name="is_nav" required> 是
                                </label>
                                <label class="am-radio-inline">
                                    <input type="radio" value="0" nav="0" name="is_nav"> 否
                                </label>
                            </div>

                            <div class="am-form-group">
                                <label for="sort_num">排序数字：</label>
                                <input type="text" name="sort_num" id="sort_num" placeholder="输入排序数字" pattern="^\d{1,}$" required/>
                            </div>

                            <button class="am-btn am-btn-secondary" type="submit">提交</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
            <div class="am-modal-dialog">
                <div class="am-modal-bd">
                    确定删除吗?
                </div>
                <div class="am-modal-footer">
                    <a href="" id="delConfirm" class="am-btn-modal">确定</a>
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

    $(".addmore").click(function(){
        var img=$(this);
        if( img.attr('src')=="/Public/Admin/img/btn_jia.gif"){
            img.attr('src',"/Public/Admin/img/btn_jian.gif");
            img.parent().parent().nextAll().each(function(i,val){
                //alert($(val).attr('class'));
                if($(val).attr('clas')==parseInt(img.parent().parent().attr('clas'))+1){
                    $(val).show();
                }else{
                    if($(val).attr('clas')<=parseInt(img.parent().parent().attr('clas'))){
                        return false;
                    }
                }
            })
        }else{
            $(this).attr('src',"/Public/Admin/img/btn_jia.gif");
            img.parent().parent().nextAll().each(function(i,val){
                if($(val).attr('clas')>parseInt(img.parent().parent().attr('clas'))){
                    $(val).hide();
                    $(val).children('td').find('img.add').attr('src',"/Public/Admin/img/btn_jia.gif");
                }else{
                    return false;
                }
            })
        }
    });
    //点击改变排序数量
    $(".sortn").blur(function(){
        var num=$(this).val();
        var pid=$(this).attr('pid');
        $.post("<?php echo U('Category/editSortnum');?>",{id:pid,num:num},function(e){
            $(this).val(e.num);
        },"json");
    });
    $(".xs").find('img').click(function() {
        if(confirm('你确定要修改吗')){
            var url = "<?php echo U('Category/ajaxChange');?>";
            var val = $(this).attr('xs');
            var mid = $(this).parent().attr('mid');
            if (val == 1) {
                $.post(url, {xs: val, mid: mid,type:1});
                $(this).attr('src', "/Public/Admin/img/error.png");
                $(this).attr('xs', '0');

            } else {
                $.post(url, {xs: val, mid: mid,type:1});
                $(this).attr('src', "/Public/Admin/img/true.png");
                $(this).attr('xs', '1');
            }
        }else{
            return false;
        }
    });
    $(".dh").find('img').click(function() {
        if(confirm('你确定要修改吗')){
            var url = "<?php echo U('Category/ajaxChange');?>";
            var val = $(this).attr('xs');
            var mid = $(this).parent().attr('mid');
            //alert(mid);
            if (val == 1) {
                $.post(url, {xs: val, mid: mid,type:2});
                $(this).attr('src', "/Public/Admin/img/error.png");
                $(this).attr('xs', '0');
            } else {
                $.post(url, {xs: val, mid: mid,type:2});
                $(this).attr('src', "/Public/Admin/img/true.png");
                $(this).attr('xs', '1');
            }
        }else{
            return false;
        }
    });
    //点击是否显示
    $('.add').click(function(){
        var img=$(this);
        //alert(img.parent().parent().attr('class'));
        //return false;
        if( img.attr('src')=="/Public/Admin/img/btn_jia.gif"){
            img.attr('src',"/Public/Admin/img/btn_jian.gif");
            img.parent().parent().nextAll().each(function(i,val){
                //alert($(val).attr('class'));
                if($(val).attr('clas')==parseInt(img.parent().parent().attr('clas'))+1){
                    $(val).show();
                }else{
                    if($(val).attr('clas')<=parseInt(img.parent().parent().attr('clas'))){
                        return false;
                    }
                }
            })
        }else{
            $(this).attr('src',"/Public/Admin/img/btn_jia.gif");
            img.parent().parent().nextAll().each(function(i,val){
                //alert($(val).attr('class'));
                if($(val).attr('clas')>parseInt(img.parent().parent().attr('clas'))){
                    $(val).hide();
                    $(val).children('td').find('img.add').attr('src',"/Public/Admin/img/btn_jia.gif");
                }else{
                    return false;
                }
            })
        }
    });

    $('#cat-add').click(function(){
        $("input[name='id']").val('');
        $("input[name='pid']").val('0');
        $("input[name='cate_name']").val('');
        $("input[name='sort_num']").val('');
        $("#model_name").val('');
        $("input[name='is_show']").prop('checked',false);
        $("input[name='is_nav']").prop('checked',false);
    });

    $('.cat-son').click(function(){
        var pid=$(this).attr('catId');
        $("input[name='id']").val('');
        $("input[name='pid']").val(pid);
        $("input[name='cate_name']").val('');
        $("input[name='sort_num']").val('');
        $("#model_name").val('');
        $("input[name='is_show']").prop('checked',false);
        $("input[name='is_nav']").prop('checked',false);
    });

    $('.cat-edit').click(function(){
        var Aid = $(this).attr('catId');
        $.ajax({
            type:'post',
            url:"<?php echo U('Admin/Category/ajax_content');?>",
            data:'Aid='+Aid,
            dataType:'json',
            success:function(json){
                $("input[name='id']").val(json.id);
                $("input[name='cate_name']").val(json.cate_name);
                $("input[name='sort_num']").val(json.sort_num);
                $("input[show="+json.is_show+"]").prop('checked',true);
                $("input[nav="+json.is_nav+"]").prop('checked',true);
                $("#model_name").val(json.model_name);
                $("input[name='pid']").val(json.pid);
            }
        })
    });

    $('.cat-del').click(function(){
        var id = $(this).attr('catId');
        var url = '/Admin/Category/catDelete/id/'+id;
        $('#delConfirm').attr('href',url);
    });

</script>