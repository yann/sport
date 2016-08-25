<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" conatent="width=device-width, initial-scale=1" />
	<title>登陆</title>
	<link rel="stylesheet" href="/SportsWeb/sport/Public/css/bootstrap.min.css" />
	<script src="/SportsWeb/sport/Public/js/jquery-1.11.3.min.js"></script>
	<script src="/SportsWeb/sport/Public/js/bootstrap.min.js"></script>
	<style>
		body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}	
		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button{
		    -webkit-appearance: none !important;
		    margin: 0; 
		}
		input[type="number"]{-moz-appearance:textfield;}
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
					<ul class="nav navbar-nav navbar-right"">
						<li href="#" class="active">
							<a href="/SportsWeb/sport/index.php/Home/Login/login">登陆</a>
						</li>
						<li href="#">
							<a href="/SportsWeb/sport/index.php/Home/Register/register">注册</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container">
		<form action="do_login" class="form-signin" onsubmit="return validate()" method="post">
			<h2 class="form-signin-heading text-center">
				登录
			</h2>
			<label for="inputStuNum">学号：</label>
			<input type="number" id="inputStuNum"  name="inputStuNum" class="form-control" placeholder="student number" required="true" autofocus="true" />
			<label for="inputPassword">密码：</label>
			<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="password" required="true" />
			<input type="text" class="form-control"  placeholder='verify' name="loverify" required="true">
			<img onclick="this.src=this.src+'?'+Math.random()" src="/SportsWeb/sport/index.php/Home/Login/verify">
			<div class="checkbox">
				<label>
					<input type="checkbox" id="remember" value="remember-me" name="checkbox"> Remember me
				</label>
			</div>
			<button class="btn btn-lg btn-primary btn-block">登陆</button>
		</form>
	</div>
	<div class="container">
		<!-- Button trigger modal -->
		<button style="display: none;" id="myModBtn" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
			Launch demo modal
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"></h4>
					</div>
					<div class="modal-body">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
    function validate() {
        if ($('#inputStuNum').val().length != 10) {
            $('#myModalLabel').text('学号错误');
            $('.modal-body').text('学号长度不够');
            $('#myModBtn').click();
            return false;
        }
            if ($('#remember').is(':checked')) {
                document.cookie = 'StuNum' + '=' + $('#inputStuNum').val();
                document.cookie = 'Password' + '=' + $('#inputPassword').val();
            } else {
                var keys=document.cookie.match(/[^ =;]+(?=\=)/g);
                if (keys) {
                    for (var i =  keys.length; i--;)
                        document.cookie=keys[i]+'=0;expires=' + new Date( 0).toUTCString()
                }
            }
            console.log(document.cookie);
    }
    $(document).ready(function () {
        if (document.cookie != '') {
            var info = document.cookie.split(';');
            $('#inputStuNum').val(info[0].split('=')[1]);
            $('#inputPassword').val(info[1].split('=')[1]);
        }
    });
</script>