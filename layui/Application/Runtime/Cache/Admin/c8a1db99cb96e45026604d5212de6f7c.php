<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>栏目管理</title>
    <script src="/layui/Public/Admin/js/jquery-2.1.1.min.js"></script>
    <!--<link href="__ADMIN_ACEADMIN__/css/bootstrap.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/layui/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <!--[if IE 7]>
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome-ie7.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace.min.css" />
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-skins.min.css" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-ie.min.css" />
    <![endif]-->
    <script src="__ADMIN_ACEADMIN__/js/ace-extra.min.js"></script>
    <!--[if lt IE 9]>
    <script src="__ADMIN_ACEADMIN__/js/html5shiv.js"></script>
    <script src="__ADMIN_ACEADMIN__/js/respond.min.js"></script>
    <![endif]-->
    <bootstrapcss />
</head>
<body>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            首页
        </li>

        <li class="active">栏目管理</li>
    </ul><!-- /.breadcrumb -->
</div>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#home" data-toggle="tab">栏目列表</a>
    </li>
    <li>
        <button class="btn btn-sm btn-info" data-toggle="modal" onclick="add_cate()">
            添加栏目
        </button>
    </li>
</ul>

<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th width="5%">排序</th>
                    <th>栏目名称</th>
                    <th>模块名称</th>
                    <th>是否显示</th>
                    <th>是否导航</th>
                    <th >操作</th>
                </tr>
                </thead>

                <tbody>
                <?php if(is_array($dlist)): foreach($dlist as $k=>$vo): if($vo['model_name'] != Self): ?><tr class="gradeU" clas="<?php echo ($vo['level']); ?>"
                            style="<?php if($vo["level"] > 0): ?>display:none<?php endif; ?>">
                            <td class="jz "><input type='text' class='sortn' value="<?php echo ($vo["sort_num"]); ?>"
                                                           pid="<?php echo ($vo["id"]); ?>"
                                                   size='3' />
                            </td>
                            <!--<td class="jz"><?php echo ($vo["id"]); ?></td>-->
                            <td class="col-sm-5" style="cursor:pointer;">
                                <?php echo (str_repeat("&nbsp;&nbsp;",$vo['level']*2)); ?>
                                <img class='addmore' src="/layui/Public/Admin/img/btn_jia.gif"/> <b>&nbsp;<?php echo ($vo ["cate_name"]); ?></b>
                            </td>
                            <td class="jz col-sm-1">
                                <span class="text-info">
                                    <?php if($vo["model_name"] == 'Active'): ?>列表模块
                                    <?php elseif($vo["model_name"] == 'About'): ?>单编辑模块
                                        <?php elseif($vo["model_name"] == 'Teacher'): ?>老师列表模块<?php endif; ?>
                                </span>
                            </td>

                            <td class="jz xs col-sm-1"  mid="<?php echo ($vo["id"]); ?>">
                                <?php if($vo['is_show'] == 1): ?><img src="/layui/Public/Admin/img/true.png" xs="1" /><?php else: ?>
                                    <img src="/layui/Public/Admin/img/error.png" xs="0" /><?php endif; ?>
                            </td>
                            <td class="jz dh col-sm-1" mid="<?php echo ($vo["id"]); ?>">
                                <?php if($vo['is_nav'] == 1): ?><img src="/layui/Public/Admin/img/true.png" xs="1" /><?php else: ?>
                                    <img src="/layui/Public/Admin/img/error.png" xs="0" /><?php endif; ?>
                            </td>

                            <td class="jz col-sm-4">
                                <a class="label label-danger" href="<?php echo U($vo['model_url'],array('cid'=>$vo['id']));?>">内容管理</a>
                                &nbsp;
                                <a class="label label-success" catID="<?php echo ($vo['id']); ?>" onclick="add_child(this)">添加子类</a>
                                &nbsp;
                                <a class="label label-info" onclick="edit_cat(this)" catID="<?php echo ($vo['id']); ?>">编辑
                                </a>
                                &nbsp;
                                <a class="label label-warning"
                                   href="<?php echo U('Category/catDelete',array('id'=>$vo['id']));?>">删除</a>
                            </td>
                        </tr><?php endif; endforeach; endif; ?>
                </tbody>

                <script>
                    //点击增加
                    $(function(){
                        $(".addmore").click(function(){
                            var img=$(this);
                            //alert(img.parent().parent().attr('class'));
                            //return false;
                            if( img.attr('src')=="/layui/Public/Admin/img/btn_jia.gif"){
                                img.attr('src',"/layui/Public/Admin/img/btn_jian.gif");
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
                                $(this).attr('src',"/layui/Public/Admin/img/btn_jia.gif");
                                img.parent().parent().nextAll().each(function(i,val){
                                    //alert($(val).attr('class'));
                                    if($(val).attr('clas')>parseInt(img.parent().parent().attr('clas'))){
                                        $(val).hide();
                                        $(val).children('td').find('img.add').attr('src',"/layui/Public/Admin/img/btn_jia.gif");
                                    }else{
                                        return false;
                                    }
                                })
                            }
                        })
                    })

                    //点击改变排序数量
                    $(function(){
                        $(".sortn").blur(function(){
                            var num=$(this).val();
                            var pid=$(this).attr('pid');
                            //alert($(this).parent().siblings().length);
                            //var url=$(this).parent().siblings().find(".urllj").val();
                            //alert(num);
                            $.post("<?php echo U('Category/editSortnum');?>",{id:pid,num:num},function(e){
                                $(this).val(e.num);
                                //$(this).parent().siblings().find(".urllj").val(e.url)
                            },"json");
                        })
                        $(".xs").find('img').click(function() {
                            if(confirm('你确定要修改吗')){
                                var url = "<?php echo U('Category/ajaxChange');?>";
                                var val = $(this).attr('xs');
                                var mid = $(this).parent().attr('mid');
                                if (val == 1) {
                                    $.post(url, {xs: val, mid: mid,type:1});
                                    $(this).attr('src', "/layui/Public/Admin/img/error.png");
                                    $(this).attr('xs', '0');

                                } else {
                                    $.post(url, {xs: val, mid: mid,type:1});
                                    $(this).attr('src', "/layui/Public/Admin/img/true.png");
                                    $(this).attr('xs', '1');
                                }
                            }else{
                                return false;
                            }
                        })
                        $(".dh").find('img').click(function() {
                            if(confirm('你确定要修改吗')){
                                var url = "<?php echo U('Category/ajaxChange');?>";
                                var val = $(this).attr('xs');
                                var mid = $(this).parent().attr('mid');
                                //alert(mid);
                                if (val == 1) {
                                    $.post(url, {xs: val, mid: mid,type:2});
                                    $(this).attr('src', "/layui/Public/Admin/img/error.png");
                                    $(this).attr('xs', '0');
                                } else {
                                    $.post(url, {xs: val, mid: mid,type:2});
                                    $(this).attr('src', "/layui/Public/Admin/img/true.png");
                                    $(this).attr('xs', '1');
                                }
                            }else{
                                return false;
                            }
                        })
                    })
                    //点击是否显示

                    $(function(){
                        $('.add').click(function(){
                            var img=$(this);
                            //alert(img.parent().parent().attr('class'));
                            //return false;
                            if( img.attr('src')=="/layui/Public/Admin/img/btn_jia.gif"){
                                img.attr('src',"/layui/Public/Admin/img/btn_jian.gif");
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
                                $(this).attr('src',"/layui/Public/Admin/img/btn_jia.gif");
                                img.parent().parent().nextAll().each(function(i,val){
                                    //alert($(val).attr('class'));
                                    if($(val).attr('clas')>parseInt(img.parent().parent().attr('clas'))){
                                        $(val).hide();
                                        $(val).children('td').find('img.add').attr('src',"/layui/Public/Admin/img/btn_jia.gif");
                                    }else{
                                        return false;
                                    }
                                })
                            }
                        })
                    })
                </script>

                <tr>
                    <th>
                        <a href="<?php echo U('Category/catLis');?>" class="btn btn-success btn-sm" type="submit">排序</a>
                    </th>
                </tr>

            </table>
        </div>
</div>

<!-- 修改菜单模态框开始 -->
<div class="modal fade" id="cat-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    修改菜单
                </h4>
            </div>
            <div class="modal-body">

                <form role="form" id="form" action="<?php echo U('Category/catAdd');?>" method="post"
                      enctype="multipart/form-data">

                    <div class="form-group">
                        <label>栏目名称</label>
                        <input type="text" name="cate_name" datatype="*1-20"
                               nullmsg="请输入栏目名称" errormsg="长度不能超过20"
                               placeholder="请输入栏目名称" class="form-control">
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>
                    <input type="hidden" name='id'>
                    <input type="hidden" name='pid'>
                    <div class="form-group">
                        <label>内容模块</label>
                        <select id="model_name" name="model_name" datatype="*" about="">
                            <option value="">--请选择--</option>
                            <option value="Active">文章模块</option>
                            <option value="About">单编辑页模块</option>
                        </select>
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>


                    <div class="form-group">
                        <label>是否显示</label>
                        <input type="radio" name="is_show" value="1" show="1" datatype="*" nullmsg="请选择">是
                        <input type="radio" name="is_show"  show="0" value="0">否
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>

                    <div class="form-group">
                        <label>是否导航</label>
                        <input type="radio" id="is_nav" name="is_nav" nav="1" value="1" datatype="*" nullmsg="请选择">是
                        <input type="radio" name="is_nav"  nav="0" value="0">否
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>

                    <div class="form-group">
                        <label>栏目排序</label>
                        <input type="text" name="sort_num"
                               datatype="n"
                               nullmsg="请输入排序数字"
                               placeholder="请输入排序数字" class="form-control">
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>

                    <div>
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>提交</strong>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- 修改菜单模态框结束 -->

<script>

    function add_cate(){
        $("input[name='id']").val('');
        $("input[name='pid']").val('0');
        $("input[name='cate_name']").val('');
        $("input[name='sort_num']").val('');
        $("#model_name").val('');
        $("input[name='is_show']").prop('checked',false);
        $("input[name='is_nav']").prop('checked',false);
        $('#cat-edit').modal('show');
    }

    // 添加子栏目
    function add_child(obj){
        var catId=$(obj).attr('catId');
        $("input[name='id']").val('');
        $("input[name='pid']").val(catId);
        $("input[name='cate_name']").val('');
        $("input[name='sort_num']").val('');
        $("#model_name").val('');
        $("input[name='is_show']").prop('checked',false);
        $("input[name='is_nav']").prop('checked',false);
        $('#cat-edit').modal('show');
    }

    //编辑栏目
    function edit_cat(obj){
        var Aid = $(obj).attr('catID');
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
        });

        $('#cat-edit').modal('show');
    }

</script>

<bootstrapjs />




</body>
</html>