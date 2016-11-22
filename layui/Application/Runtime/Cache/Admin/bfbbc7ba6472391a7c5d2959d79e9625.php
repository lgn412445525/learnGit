<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
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

<!-- 导航栏开始 -->
<div class="bjy-admin-nav">
    <i class="fa fa-home"></i>&nbsp;&nbsp;首页
    &gt;
    &nbsp;栏目管理
</div>
<!-- 导航栏结束 -->

<div style="height:20px;"></div>

<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#home" data-toggle="tab">文章-新闻-视频列表</a>
    </li>
    <li>
        <button class="btn btn-sm btn-info" data-toggle="modal" onclick="add_article()">
            添加
        </button>
    </li>
</ul>

<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
        <table id="simple-table" class="table  table-bordered table-hover" style="margin-bottom:0px;">
            <thead>
            <tr>
                <th>标题</th>
                <th>栏目名称</th>
                <th>发布时间</th>
                <th>操作</th>
            </tr>
            </thead>

            <tbody>

            <?php if(is_array($dlist)): foreach($dlist as $k=>$vo): ?><tr class="gradeU" id="<?php echo ($vo["id"]); ?>">
                    <td class="jz col-sm-3">
                        <b class="text-success"><?php echo ($vo["title"]); ?></b>
                    </td>
                    <td class="jz col-sm-2 text-primary"><?php echo ($va["cate_name"]); ?></td>
                    <td class="jz col-sm-2 text-danger"><?php echo (date('Y-m-d h:i:s',$vo["uptime"])); ?></td>

                    <!--<td class="jz xs col-sm-1"  mid="<?php echo ($vo["id"]); ?>">-->
                        <!--<?php if($vo['is_common'] == 1): ?>-->
                            <!--<img src="/layui/Public/Admin/img/true.png" xs="1" /><?php else: ?>-->
                            <!--<img src="/layui/Public/Admin/img/error.png" xs="0" />-->
                        <!--<?php endif; ?>-->
                    <!--</td>-->
                    <!--<td class="jz dh col-sm-1" mid="<?php echo ($vo["id"]); ?>">-->
                        <!--<?php if($vo['is_super'] == 1): ?>-->
                            <!--<img src="/layui/Public/Admin/img/true.png" xs="1" /><?php else: ?>-->
                            <!--<img src="/layui/Public/Admin/img/error.png" xs="0" />-->
                        <!--<?php endif; ?>-->
                    <!--</td>-->

                    <!--<td class="jz sh col-sm-1" mid="<?php echo ($vo["id"]); ?>">-->
                        <!--<?php if($vo['is_vip'] == 1): ?>-->
                            <!--<img src="/layui/Public/Admin/img/true.png" xs="1" /><?php else: ?>-->
                            <!--<img src="/layui/Public/Admin/img/error.png" xs="0" />-->
                        <!--<?php endif; ?>-->
                    <!--</td>-->

                    <td class="jz col-sm-3">
                        <a class="label label-info" onclick="edit_article(this)"
                           Aid="<?php echo ($vo['id']); ?>"
                        >编辑</a>

                        <a class="label label-warning"
                           href="<?php echo U('Active/delete',array('id'=>$vo['id'],'cid'=>I('get.cid')));?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>

            <tr>
                <th>
                    <a href="<?php echo U('Active/lis',array('id'=>$vo['id'],'cid'=>I('get.cid'),'p'=>I('get.p')));?>"
                       class="btn btn-success btn-sm" type="submit">刷新</a>
                </th>
            </tr>

            </tbody>


        </table>
    </div>
</div>

<div class="col-sm-6">
</div>
<div class="col-sm-6">
    <ul class="pagination">
        <?php echo ($plist); ?>
    </ul>
</div>


<!-- 添加菜单模态框开始 -->
<div class="modal fade" id="art-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:720px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    添加-修改
                </h4>
            </div>

            <div class="modal-body">

                <form role="form" id="form"
                      action="<?php echo U('Active/article',array('cid'=>I('get.cid'),'p'=>I('get.p')));?>" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" name="cate_id" value="<?php echo I('get.cid');?>"/>
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label>标题</label>
                        <input type="text" name="title"
                               datatype="*1-30"
                               nullmsg="请输入标题" errormsg="长度不能超过30"
                               placeholder="请输入标题名称" class="form-control">
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>
                    <!--<div class="form-group">-->
                        <!--<label>信息来源</label>-->
                        <!--<input type="text" name="info_from"-->
                               <!--datatype="*1-30"-->
                               <!--nullmsg="请输入标题" errormsg="长度不能超过30"-->
                               <!--placeholder="请输入标题名称" class="form-control">-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>作者</label>-->
                        <!--<input type="text" name="author"-->
                               <!--nullmsg="请输入作者" errormsg="长度不能超过20"-->
                               <!--placeholder="请输入作者" class="form-control" >-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->

                    <div class="form-group">
                        <div id="logo"></div>
                        <input type="file" name="myfile"/>
                    </div>

                    <div class="form-group">
                        <label>发布时间</label>
                        <input type="text" name="uptime" id="demo"
                               placeholder="请输入发布时间"  class="laydate-icon">
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>
                    <script>
                        ;!function(){
                            laydate.skin('molv');
                            laydate({
                                elem: '#demo',
                                istime:true,
                                format: 'YYYY-MM-DD hh:mm:ss', // 分隔符可以任意定义，该例子表示只显示年月
                                /*festival: true, //显示节日
                                 choose: function(datas){ //选择日期完毕的回调
                                 alert('得到：'+datas);
                                 }*/
                            });
                        }();
                    </script>
                    <!--<div class="form-group">-->
                        <!--<label>普通会员</label><br>-->
                        <!--<input type="radio" name="is_common" common="1" value="1" datatype="*" nullmsg="请选择">是-->
                        <!--<input type="radio" name="is_common" common="0" value="0">否-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>高级会员</label><br>-->
                        <!--<input type="radio" name="is_super" isSuper="1" value="1" datatype="*" nullmsg="请选择">是-->
                        <!--<input type="radio" name="is_super" isSuper="0" value="0">否-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                        <!--<label>VIP会员</label><br>-->
                        <!--<input type="radio" name="is_vip" vip="1" value="1" datatype="*" nullmsg="请选择">是-->
                        <!--<input type="radio" name="is_vip" vip="0" value="0">否-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->
                    <!--&lt;!&ndash; nullmsg="请输入排序数字" placeholder="请输入排序数字" datatype="n" &ndash;&gt;-->
                    <!--<div class="form-group">-->
                        <!--<label>文章排序</label>-->
                        <!--<input type="text" name="sort_num"-->
                               <!--datatype="n"-->
                               <!--nullmsg="请输入排序数字"-->
                               <!--placeholder="请输入排序数字" class="form-control">-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->

                    <div class="form-group">
                        <label>浏览量</label>
                        <input type="text" name="hits"
                               datatype="n"
                               nullmsg="请输入浏览量"
                               placeholder="请输入浏览量" class="form-control">
                        <div class="error" style="position:relative;left:365px;top:-25px"></div>
                    </div>

                    <!--<div class="form-group">-->
                        <!--<label>所属栏目</label>-->
                        <!--<?php if(is_array($cate_name)): foreach($cate_name as $key=>$vo): ?>-->
                            <!--<?php echo ($vo["cate_name"]); ?> <input type="checkbox" name="cateadd[]" catid="<?php echo ($vo["id"]); ?>"-->
                                                   <!--value="<?php echo ($vo['id']); ?>" >-->
                        <!--<?php endforeach; endif; ?>-->
                    <!--</div>-->

                    <!--<div class="form-group">-->
                        <!--<label>描述</label>-->
                        <!--<textarea name="des"-->
                                  <!--nullmsg="请输入描述" errormsg="长度不能超过30"-->
                                  <!--placeholder="请输入描述" class="form-control"></textarea>-->
                        <!--<div class="error" style="position:relative;left:485px;top:-25px"></div>-->
                    <!--</div>-->

                    <div class="form-group">
                        <label>文章内容</label><br>
                        <textarea id="text" name="content" cols="30" rows="3" style="width:680px;height:300px">

                        </textarea>
                        <!--引入kindeditor编辑器-->
                        <script charset="utf-8" src="/layui/Public/kindeditor/kindeditor.js"></script>
                        <script charset="utf-8" src="/layui/Public/kindeditor/lang/zh_CN.js"></script>
                        <script type="text/javascript">
                            var editor;
                            KindEditor.ready(function(K) {
                                editor = K.create('textarea[name="content"]', {
                                    allowFileManager : true,
                                    afterBlur : function() {
                                        //编辑器失去焦点时直接同步，可以取到值
                                        this.sync();
                                    }
                                    //editor.html('depremark');
                                });
                            });
                        </script>
                        <!--引入kindeditor编辑器-->
                        <div class="error" style="position:relative;left:485px;top:-25px"></div>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>提交</strong>
                        </button>
                    </div>
                </form>

                <script type="text/javascript" src="/layui/Public/Home/zdy/Validform.js"></script>
                <script>
                    $("#form").Validform({
                        tiptype:function(msg,o,cssctl) {
                            if (!o.obj.is("form")) {
                                var objtip = o.obj.siblings('div.error');
                                cssctl(objtip, o.type);
                                objtip.text(msg);
                            }
                        }
                    })
                </script>

            </div>

        </div>
    </div>
</div>
<!-- 添加菜单模态框结束 -->



<script>

    function add_article(obj){
        $("input[name='id']").val('');
        $("input[name='title']").val('');
        $("input[name='hits']").val('');
        $("input[name='uptime']").val('');
        editor.text('');
        $("#logo").html('');
        $('#art-add').modal('show');
    }


    //编辑文章
    function edit_article(obj){

        var Aid = $(obj).attr('Aid');

        $.ajax({
            type:'post',
            url:"<?php echo U('Admin/Active/ajax_content');?>",
            data:'Aid='+Aid,
            dataType:'json',
            success:function(json){
                $("input[name='id']").val(json.id);
                $("input[name='cate_name']").val(json.cate_name);
                $("input[name='title']").val(json.title);
                $("input[name='hits']").val(json.hits);
                $("input[name='uptime']").val(json.uptime);
                editor.html(json.content);
                if(logo){
                    $("#logo").html('<img id="logo" src="'+json.logo+'" width="200px" height="200px"/>');
                } else {
                    $("#logo").html('');
                }
            }
        });


        $('#art-add').modal('show');
    }


</script>
<bootstrapjs />





</body>
</html>