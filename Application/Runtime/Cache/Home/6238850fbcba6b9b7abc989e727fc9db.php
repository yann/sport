<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Personal</title>
    <meta charset="UTF-8" />
    <meta name="viewport" conatent="width=device-width, initial-scale=1" />
    <title>登陆</title>
    <link rel="stylesheet" href="/SportsWeb/sport/Public/css/bootstrap.min.css" />
    <script src="/SportsWeb/sport/Public/js/jquery-1.11.3.min.js"></script>
    <script src="/SportsWeb/sport/Public/js/bootstrap.min.js"></script>
    <style>
    body {
        padding: 60px;
    }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Project name</a>
                </div>
                <div class="navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/SportsWeb/sport/index.php/Home">主页</a>
                        </li>
                        <li>
                            <a href="/SportsWeb/sport/index.php/Home/Rank/rank">排行</a>
                        </li>
                        <li>
                            <a href="/SportsWeb/sport/index.php/Home/Activity/activity">活动</a>
                        </li>
                    </ul>
                    <div class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                    <ul class="nav navbar-nav navbar-right" ">
                        <li href="# " class="active ">
                            <a href="/SportsWeb/sport/index.php/Home/Login/login ">登陆</a>
                        </li>
                        <li href="# ">
                            <a href="/SportsWeb/sport/index.php/Home/Register/register ">注册</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container ">
        <table class="table table-striped table-bordered ">
        <caption class="text-center "><h2>个人信息</h2></caption>
        <thead>
            <tr>
                <th class="text-center ">学号</th>
                <th class="text-center ">姓名</th>
                <th class="text-center ">班级</th>
                <th class="text-center ">年级</th>
                <th class="text-center ">学院</th>
                <th class="text-center ">性别</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($array )): $i = 0; $__LIST__ = $array ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo ): $mod = ($i % 2 );++$i;?><tr>
                    <td class="text-center "><?php echo ($vo["id"]); ?></td>
                    <td class="text-center "><?php echo ($vo["name"]); ?></td>
                    <td class="text-center "><?php echo ($vo["classid"]); ?></td>
                    <td class="text-center "><?php echo ($vo["grade"]); ?></td>
                    <td class="text-center " class="text-center "><?php echo ($vo["academy"]); ?></td>
                    <td class="text-center "><?php echo ($vo["sex"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="table table-striped table-bordered ">
        <caption class="text-center "><h2>已比项目</h2></caption>
        <thead>
            <th class="text-center ">名称</th>
            <th class="text-center ">时间</th>
            <th class="text-center ">分数</th>
            <th class="text-center ">名次</th>
        </thead>
        <tbody>
            <?php if(is_array($already )): $i = 0; $__LIST__ = $already ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$al ): $mod = ($i % 2 );++$i;?><tr class="text-center ">
                    <td><?php echo ($al["name"]); ?> </td>
                    <td><?php echo ($al["hosttime"]); ?></td>
                    <td><?php echo ($al["rank"]); ?></td> 
                    <td> <?php echo ($al["score"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="table table-striped table-bordered ">
        <caption class="text-center "><h2>未比项目</h2></caption>
        <thead>
            <th class="text-center ">名称</th>
            <th class="text-center ">时间</th>
        </thead>
        <tbody>
            <?php if(is_array($undo )): $i = 0; $__LIST__ = $undo ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$al1 ): $mod = ($i % 2 );++$i;?><tr class="text-center ">
                    <td><?php echo ($al1["name"]); ?> </td>
                    <td><?php echo ($al1["hosttime"]); ?></td>     
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    </div>
</body>
</html>
<script>
    $(document).ready(function (argument) {
          $.ajax({
            url: '/SportsWeb/sport/index.php/Home/Personal/checkSession',
            type: 'post',
            success: function(data) {
                if (data != 'please login') {
                    $('.navbar-right li a').eq(0).text(data).attr('href', '/SportsWeb/sport/index.php/Home/Personal/personal');
                    $('.navbar-right li a').eq(1).text('注销').attr('href', '/SportsWeb/sport/index.php/Home/Personal/logout');
                }
            }
        });
    });
</script>