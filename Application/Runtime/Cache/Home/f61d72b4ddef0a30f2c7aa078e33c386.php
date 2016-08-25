<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" conatent="width=device-width, initial-scale=1" />
	<title>注册</title>
	<link rel="stylesheet" href="/sportsweb/sport/Public/css/bootstrap.min.css" />
	<script src="/sportsweb/sport/Public/js/jquery-1.11.3.min.js"></script>
	<script src="/sportsweb/sport/Public/js/bootstrap.min.js"></script>
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
							<a href="/sportsweb/sport/index.php/Home">主页</a>
						</li>
						<li>
							<a href="/sportsweb/sport/index.php/Home/Rank/rank">排行</a>
						</li>
						<li>
							<a href="/sportsweb/sport/index.php/Home/Activity/activity">活动</a>
						</li>
					</ul>
					<div class="navbar-form navbar-left" role="search">
						<div class="form-group">
							<input type="text" placeholder="Search" class="form-control">
						</div>
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
					<ul class="nav navbar-nav navbar-right"">
						<li href="#">
							<a href="/sportsweb/sport/index.php/Home/Login/login">登陆</a>
						</li>
						<li href="#" class="active">
							<a href="/sportsweb/sport/index.php/Home/Register/register">注册</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container">
		<form action="/sportsweb/sport/index.php/Home/Register/do_register" onsubmit="return validate()" class="form-signin" method="post">
			<h2 class="form-signin-heading text-center">
				注册
			</h2>
			<label for="inputStuNum">学号：</label>
			<input type="number" name="inputStuNum" id="inputStuNum" class="form-control" placeholder="student number" required="true" />
			<label for="inputStuName">姓名：</label>
			<input type="text" id="inputStuName" name="inputStuName"   class="form-control" placeholder="student name" required="true" />
			<label for="inputPassword">密码：</label>
			<input type="password" id="inputPassword" name="inputPassword"  class="form-control" placeholder="password" required="true" />
			<label for="inputConfirm">确认密码：</label>
			<input type="password" id="inputConfirm" name="inputConfirm" class="form-control" placeholder="confirm password" required="true" />
			<label for="inputStuClass">班级：</label>
			<input type="number" name="inputStuClass" id="inputStuClass" class="form-control" placeholder="student class" required="true" />
			<label for="inputGrade">年级：</label>
			<select type="text" id="inputGrade" name="inputGrade" class="form-control" placeholder="grade" required="true">
            </select>
			<label for="inputCollege">学院：</label>
			<select type="text" id="inputcollege" name="inputCollege" class="form-control" placeholder="college" required="true">
            </select>
			<div class="radio">
				<label>
					<input type="radio" name="optionsRadio" id="optionsRadio1" required value="male"> 男
				</label>
				<label>
					<input type="radio" name="optionsRadio" id="optionsRadio2" required value="female"> 女
				</label>
			</div>
			<label for="reverify">验证：</label>
			<input type="text" class="form-control" id="reverify" placeholder='verify' name="reverify" required="true">
			<img onclick="this.src=this.src+'?'+Math.random()" src="/sportsweb/sport/index.php/Home/Register/verify">
			<!-- <div class="checkbox">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div> -->

			<button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
		</form>
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
	</div>
</body>
</html>
<script>
    $(document).ready(function () {
        (function () {
            $.ajax({
                url: '/sportsweb/sport/index.php/Home/Register/ajaxAcademy',
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    for (var i=0; i<data.length; i++) {
                        $('#inputcollege').append('<option value="' + data[i].name + '">' + data[i].name + '</option>');
                    }
                }
            });
        })();
        $('#inputStuNum').blur(function () {
           $.ajax({
               url: '/sportsweb/sport/index.php/Home/Register/ajaxNum',
               type: 'post',
               data: {'StuNum': $('#inputStuNum').val()},
               success: function (data) {
                   if(data == 'already') {
                       $('#myModalLabel').text('学号已注册');
                       $('.modal-body').text('学号已注册');
                       $('#myModBtn').click();
                   }
               }
           })
        });
        (function () {
        	var date = new Date();
        	var child = '';
        	for(var i=0; i<=6; i++) {
        		if (i>3) {
        			$('#inputGrade').append('<option value="'+ (date.getFullYear() - i) +'届研究生">' + (date.getFullYear() - i) + '届研究生</option>');
        		}else {
        			$('#inputGrade').append('<option value="'+ (date.getFullYear() - i) +'届本科生">' + (date.getFullYear() - i) + '届本科生</option>');
        		}
        	}
        })();
    });
    function validate() {
        if ($('#inputStuNum').val().length != 10) {
            $('#myModalLabel').text('学号错误');
            $('.modal-body').text('学号长度错误');
            $('#myModBtn').click();
            return false;
        }
        if ($('#inputPassword').val() != $('#inputConfirm').val()) {
            $('#myModalLabel').text('两次密码不一致');
            $('.modal-body').text('两次密码不一致');
            $('#myModBtn').click();
            return false;
        }
        if ($('#inputStuClass').val().length != 7) {
            $('#myModalLabel').text('班级错误');
            $('.modal-body').text('班级长度错误');
            $('#myModBtn').click();
            return false;
        }
    }
</script>