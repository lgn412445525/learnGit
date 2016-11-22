<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <script src="/Public/Admin/js/jquery-2.1.1.min.js"></script>
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/font-awesome-ie7.min.css" />
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace.min.css" />
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-rtl.min.css" />
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-skins.min.css" />
<link rel="stylesheet" href="__ADMIN_ACEADMIN__/css/ace-ie.min.css" />
<script src="__ADMIN_ACEADMIN__/js/ace-extra.min.js"></script>
<script src="__ADMIN_ACEADMIN__/js/html5shiv.js"></script>
<script src="__ADMIN_ACEADMIN__/js/respond.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Public/statics/bootstrap-3.3.5/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="/Public/statics/font-awesome-4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="__PUBLIC_CSS__/base.css" />
</head>


<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1" style="margin-top:100px;">
                <div class="login-container">
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-leaf green"></i>
                            <span class="red">后台</span>
                            <span class="white" id="id-text2">管理系统</span>
                        </h1>
                        <div class="space-6"></div>
                        <h4 class="blue" id="id-company-text">&copy;<?php echo (C("COMPANY_NAME")); ?></h4>
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee green"></i>
                                        登陆系统
                                    </h4>

                                    <div class="space-6"></div>

                                    <form id="form" role="form" action="<?php echo U('User/login');?>" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="username"
                                                       datatype="*1-20" nullmsg="用户名不能为空用" name="username"
                                                       errermsg="用户名太长" ajaxurl="<?php echo U('Admin/User/checkUser');?>"
                                                       class="form-control" placeholder="用户名" required="*">
                                                    <i class="ace-icon fa fa-user"></i>
                                                    <div class='error' style="position:relative;overflow:hidden;top:-25px;left:120px"></div>
                                                </span>
                                            </label>

                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <input type="password" name="password"
                                                       nullmsg="密码不能为空" errormsg="6-16位密码" datatype="*6-16"
                                                       class="form-control" placeholder="密码" >
                                                    <i class="ace-icon fa fa-lock"></i>
                                                    <div class='error' style="position: relative;overflow:hidden;top:-25px;left:110px"></div>
                                                </span>
                                            </label>

                                            <div class="space"></div>

                                            <div class="clearfix">

                                                <button type="submit" style="margin-left:30%;"
                                                        class="width-35 btn btn-sm btn-primary">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">登录</span>
                                                </button>
                                            </div>

                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>

                                    <script type="text/javascript" src="/Public/Home/zdy/Validform.js"></script>
                                    <script>
                                        $("#form").Validform({
                                            //ajaxPost:true,
                                            tiptype: function (msg, o, cssctl) {
                                                if (!o.obj.is("form")) {
                                                    var objtip = o.obj.siblings('div.error');
                                                    cssctl(objtip, o.type);
                                                    objtip.text(msg);
                                                }
                                            }
                                        })
                                    </script>

                                </div><!-- /.widget-main -->

                            </div><!-- /.widget-body -->
                        </div><!-- /.login-box -->

                    </div><!-- /.position-relative -->

                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->
<!-- basic scripts -->


</body>
</html>