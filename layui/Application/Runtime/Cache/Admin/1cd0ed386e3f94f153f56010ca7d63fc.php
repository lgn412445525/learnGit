<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
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



<div class="wrapper wrapper-content  animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox ">
                <div class="ibox-content">
                    <form role="form" id="form" action="<?php echo U('About/lis',array('id'=>$cat['id']));?>" method="post"
                          enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
                        <input type="hidden" name="cid" value="<?php echo ($cat["id"]); ?>"/>
                        <input type="hidden" name="cate_name" value="<?php echo ($cat["cate_name"]); ?>">
                        <div class="form-group">
                            <label class="col-sm-2 control-label text text-right">栏目名称:</label>
                            <div class="col-sm-9">
                                <label class="text text-left"><?php echo ($cat["cate_name"]); ?></label>
                            </div>
                        </div>

                        <div style="height:30px;"></div>
                       
                        <div class="form-group">

                            <textarea name="content" cols="50" rows="5" style="width:1000px;height:500px">
                               <?php echo html_entity_decode($vo['content']);?>
                            </textarea>
                            <!--引入kindeditor编辑器-->
                            <script charset="utf-8" src="/layui/Public/kindeditor/kindeditor.js"></script>
                            <script charset="utf-8" src="/layui/Public/kindeditor/lang/zh_CN.js"></script>
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
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong>提交</strong>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
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
<bootstrapjs />

</body>
</html>