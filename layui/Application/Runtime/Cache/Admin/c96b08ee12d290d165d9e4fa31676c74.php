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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">列表模块</strong> / <?php echo ($va["cate_name"]); ?></div>
        </div>
        <hr>

        <div class="am-g">
            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <button type="button" class="am-btn am-btn-default" data-am-modal="{target: '#active-modal', closeViaDimmer: 0,width:1100}" ><span class="am-icon-plus" id="active-add"></span> 新增</button>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-form-group">
                    <select data-am-selected="{btnSize: 'sm'}">
                        <option value="option1">所有类别</option>
                        <option value="option2">IT业界</option>
                        <option value="option3">数码产品</option>
                        <option value="option3">笔记本电脑</option>
                        <option value="option3">平板电脑</option>
                        <option value="option3">只能手机</option>
                        <option value="option3">超极本</option>
                    </select>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
                    <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
                </div>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <form class="am-form">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title" style="width:25%;">标题</th>
                            <th class="table-type" style="width:15%;">栏目名称</th>
                            <th class="table-date am-hide-sm-only" style="width:30%;">修改日期</th>
                            <th class="table-set" style="width:30%;">操作</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php if(is_array($dlist)): foreach($dlist as $k=>$vo): ?><tr>
                            <td><b><?php echo ($vo["title"]); ?></b></td>
                            <td><?php echo ($va["cate_name"]); ?></td>
                            <td class="am-hide-sm-only"><?php echo (date('Y年m月d日 h:i:s',$vo["uptime"])); ?></td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a class="am-btn am-btn-default am-btn-xs am-text-secondary active-edit" id="<?php echo ($vo['id']); ?>" data-am-modal="{target: '#active-modal', closeViaDimmer: 0,width:1100}">
                                            <span class="am-icon-pencil-square-o"></span> 编辑
                                        </a>
                                        <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only active-del" id="<?php echo ($vo['id']); ?>" cid="<?php echo ($vo['cate_id']); ?>" data-am-modal="{target:'#my-alert'}">
                                            <span class="am-icon-trash-o"></span> 删除
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr><?php endforeach; endif; ?>

                        </tbody>
                    </table>


                    <div class="am-cf">
                        共 <?php echo ($count); ?> 条记录
                        <div class="am-fr">
                            <ul class="am-pagination">
                                <?php echo ($plist); ?>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="am-modal" id="active-modal">
        <div class="am-modal-dialog">
            <form action="<?php echo U('Admin/Active/article');?>" method="post" class="am-form" id="form-with-tooltip" enctype="multipart/form-data" data-am-validator>
                <div class="am-tabs am-margin" data-am-tabs>
                    <ul class="am-tabs-nav am-nav am-nav-tabs">
                        <li class="am-active"><a href="#tab1">基本信息</a></li>
                        <li><a href="#tab2">详细描述</a></li>
                        <li><a href="#tab3">图片上传</a></li>
                        <span data-am-modal-close class="am-close am-close-alt am-close-spin am-icon-times" style="float:right;"></span>

                    </ul>
                    <div class="am-tabs-bd">
                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                            <input type="hidden" name="cate_id" value="<?php echo I('get.cid');?>"/>
                            <input type="hidden" name="id">

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    文章标题
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" class="am-input-sm" name="title" minlength="2" placeholder="请输入文章标题至少2个字符" required/>
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    文章作者
                                </div>
                                <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                    <input type="text" class="am-input-sm" name="author" placeholder="请输入作者至少2个字符" minlength="2" required/>
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">*必填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    信息来源
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" class="am-input-sm" name="info_from" placeholder="请输入信息来源">
                                </div>
                                <div class="am-hide-sm-only am-u-md-6">选填</div>
                            </div>

                            <div class="am-g am-margin-top">
                                <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                    发布时间
                                </div>
                                <div class="am-u-sm-8 am-u-md-4">
                                    <input type="text" name="uptime" id="demo" placeholder="请输入发布时间" class="am-input-sm">
                                    <script src="/Public/laydate/laydate.js"></script>
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

                                </div>
                                <div class="am-hide-sm-only am-u-md-6">若不填,为默认时间</div>
                            </div>

                        </div>

                        <div class="am-tab-panel am-fade" id="tab2">
                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-10">
                                    <textarea id="text" name="content" style="width:1000px;height:500px;">
                                    </textarea>
                                    <!--引入kindeditor编辑器-->
                                    <script charset="utf-8" src="/Public/kindeditor/kindeditor.js"></script>
                                    <script charset="utf-8" src="/Public/kindeditor/lang/zh_CN.js"></script>
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
                                </div>
                            </div>
                        </div>

                        <div class="am-tab-panel am-fade" id="tab3">
                            <div class="am-g am-margin-top-sm">
                                <div class="am-u-sm-12 am-u-md-10">

                                    <script type="text/javascript">
                                        //图片上传预览    IE是用了滤镜。
                                        function previewImage(file)
                                        {
                                            var MAXWIDTH  = 300;
                                            var MAXHEIGHT = 200;
                                            var div = document.getElementById('preview');
                                            if (file.files && file.files[0])
                                            {
                                                div.innerHTML ='<img id=imghead>';
                                                var img = document.getElementById('imghead');
                                                img.onload = function(){
                                                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                                                    img.width  =  rect.width;
                                                    img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                                                }
                                                var reader = new FileReader();
                                                reader.onload = function(evt){img.src = evt.target.result;}
                                                reader.readAsDataURL(file.files[0]);
                                            }
                                            else //兼容IE
                                            {
                                                var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                                                file.select();
                                                var src = document.selection.createRange().text;
                                                div.innerHTML = '<img id=imghead>';
                                                var img = document.getElementById('imghead');
                                                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
                                                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                                                status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
                                                div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;"+sFilter+src+"\"'></div>";
                                            }
                                        }

                                        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
                                            var param = {top:0, left:0, width:width, height:height};
                                            if( width>maxWidth || height>maxHeight )
                                            {
                                                rateWidth = width / maxWidth;
                                                rateHeight = height / maxHeight;

                                                if( rateWidth > rateHeight )
                                                {
                                                    param.width =  maxWidth;
                                                    param.height = Math.round(height / rateWidth);
                                                }else
                                                {
                                                    param.width = Math.round(width / rateHeight);
                                                    param.height = maxHeight;
                                                }
                                            }

                                            param.left = Math.round((maxWidth - param.width) / 2);
                                            param.top = Math.round((maxHeight - param.height) / 2);
                                            return param;
                                        }
                                    </script>
                                    <div id="preview" class="am-u-sm-5 am-u-md-4">
                                        <img id="imghead" border=0 src="/Public/Admin/img/los.jpg" width="210" />
                                    </div>
                                    <div class="am-form-group am-form-file">
                                        <button type="button" class="am-btn am-btn-default am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
                                        <input type="file" style="float:left;" name="myfile" onchange="previewImage(this)" class="shangc" />
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="am-margin">
                    <button type="submit" class="am-btn am-btn-primary am-btn-lg">提交保存</button>
                </div>
            </form>
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

    <footer class="admin-content-footer">
        <hr>
        <p class="am-padding-left">© 2016 AllMobilize, Inc. Licensed under MIT license.</p>
    </footer>

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


<script>

    $('.active-add').click(function(){
        $("input[name='id']").val('');
        $("input[name='title']").val('');
        $("input[name='author']").val('');
        $("input[name='info_from']").val('');
        $("input[name='uptime']").val('');
        editor.html('');
        $("#imghead").attr('src','/Public/Admin/img/los.jpg');
    });


    $('.active-edit').click(function(){
        var id = $(this).attr('id');
        $.ajax({
            type:'post',
            url:"<?php echo U('Admin/Active/ajax_content');?>",
            data:'Aid='+id,
            dataType:'json',
            success:function(json){
                $("input[name='id']").val(json.id);
                $("input[name='title']").val(json.title);
                $("input[name='author']").val(json.author);
                $("input[name='info_from']").val(json.info_from);
                $("input[name='uptime']").val(json.uptime);
                editor.html(json.content);
                if(json.logo){
                    $("#imghead").attr('src',json.logo);
                } else {
                    $("#imghead").attr('src','/Public/Admin/img/los.jpg');
                }
            }
        })
    });

    $('.active-del').click(function(){
        var id = $(this).attr('id');
        var cid = $(this).attr('cid');
        var url = '/Admin/active/delete/id/'+id+"/cid/"+cid;
        $('#delConfirm').attr('href',url);
    });

</script>