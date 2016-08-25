<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>运动会管理系统</title>
    <link href="/SportsWeb/sport/Public/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/SportsWeb/sport/Public/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="/SportsWeb/sport/Public/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 60px;
            padding-bottom: 60px;
            background-color: #eee;
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
                <a class="navbar-brand" href="#">运动会管理系统</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/SportsWeb/sport/index.php/Admin">主页</a>
                    </li>
                    <li>
                        <a href="/SportsWeb/sport/index.php/Admin/Player/player">运动员管理</a>
                    </li>
                    <li>
                        <a href="/SportsWeb/sport/index.php/Admin/News/news">新闻管理</a>
                    </li>
                    <li>
                        <a href="/SportsWeb/sport/index.php/Admin/Schedule/schedule">项目时刻表管理</a>
                    </li>
                </ul>
                <div class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Search" class="form-control">
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </nav>
</div>