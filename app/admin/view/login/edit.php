<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>武斌博客网后台管理系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="./static/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="./static/css/site.css" rel="stylesheet">
    <link href="./static/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="./static/js/jquery.min.js"></script>
    <script src="./static/bs3/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
    <style>
        i {
            color: #337ab7;
        }
    </style>
</head>
<body>
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <h4 style="display: inline;line-height: 50px;float: left;margin: 0px"><a href="index.html"
                                                                                         style="color: white;margin-left: -14px">c86学生管理后台系统</a>
                </h4>
                <div class="navbar-header">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="" target="_blank"><i class="fa fa-w fa-file-code-o"></i>文章管理</a>
                        </li>
                        <li>
                            <a href="" target="_blank"><i class="fa fa-w fa-hand-o-right"></i> 站点配置</a>
                        </li>
                        <li>
                            <a href="http://fontawesome.dashgame.com/" target="_blank"><i class="fa fa-w fa-font"></i>
                                字体库</a>
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            <?php echo $_SESSION['admin_username'] ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo u("login.edit") ?>">修改密码</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo u("login.destory")?>">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="panel panel-default" id="menus">
                <!--栏目管理 start-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample"
                     aria-expanded="false" aria-controls="collapseExample"
                     style="border-top: 1px solid #ddd;border-radius: 0%">
                    <h4 class="panel-title">栏目管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample">
                    <a href="" class="list-group-item">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        栏目列表
                    </a>
                </ul>
                <!--栏目管理 end-->

                <!--文章管理-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample2"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">文章管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample2" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample2">
                    <a href="" class="list-group-item">
                        <i class="fa fa-file-text" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        文章列表
                    </a>
                    <a href="" class="list-group-item">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        回收站
                    </a>
                </ul>
                <!--文章管理 end-->

                <!--站点配置-->
                <div class="panel-heading" role="button" data-toggle="collapse" href="#collapseExample3"
                     aria-expanded="false" aria-controls="collapseExample">
                    <h4 class="panel-title">网站配置菜单</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="#collapseExample3" aria-expanded="true">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus collapse in" id="collapseExample3">
                    <a href="" class="list-group-item">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                        <span class="pull-right" href=""></span>
                        系统配置
                    </a>
                </ul>
                <!--站点配置 end-->
            </div>
        </div>
        <!--右侧主体区域部分 start-->
        <div class="col-xs-12 col-sm-9 col-lg-10">
            <!-- TAB NAVIGATION -->
            <ul class="nav nav-tabs" role="tablist">

                <li class="active"><a href="#tab1">修改密码</a></li>
            </ul>
            <form action="" method="POST" class="form-horizontal" role="form">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">修改密码</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder=""
                                       value="<?php echo $_SESSION['admin_username'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">旧密码</label>
                            <div class="col-sm-10">
                                <input type="password" name="oldpassword" class="form-control" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" placeholder="" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">确认密码</label>
                            <div class="col-sm-10">
                                <input type="password" name="pwd" class="form-control" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">验证码</label>
                            <div class="col-sm-5">
                                <input type="text" name="captcha" class="form-control" placeholder="" value="">

                            </div>
                            <div class="col-sm-5">
                                <img src="index.php?s=admin/login/captcha" onclick="this.src=this.src+'&'+Math.random()"
                                     style="width: 40%;float: left;">


                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="admin_id" placeholder=""
                               value="<?php echo $_SESSION["admin_id"] ?>">


                    </div>
                </div>
                <button class="btn btn-primary">提交数据</button>
            </form>
        </div>
    </div>
    <!--右侧主体区域部分结束 end-->
</div>
</div>
<div class="master-footer" style="margin-top: 150px">
    <a href="http://www.wubin.pro">武斌博客</a>
    <br>
    Powered by wubin.pro v2.0 © 2017 http://www.wubin.pro
</div>
</body>
</html>