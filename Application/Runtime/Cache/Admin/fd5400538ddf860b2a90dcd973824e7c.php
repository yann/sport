<?php if (!defined('THINK_PATH')) exit();?><script src="/SportsWeb/sport/Public/js/bootstrap-datetimepicker.min.js"></script>
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
input::-webkit-inner-spin-button {
    -webkit-appearance: none !important;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>
<div class="container ">
    <form action="/SportsWeb/sport/index.php/Admin/News/join " class="form-horizontal" onsubmit="return validate() " method="post">
        <h2 class="form-signin-heading text-center ">
                新闻
            </h2>
        <div class="form-group">
            <label for="title" class="control-label col-sm-2">标题：</label>
            <div class="col-sm-10">
                <input type="number" id="title" name="title" class="form-control" placeholder="title" required="true" autofocus="true" />
            </div>
        </div>
        <div class="form-group">
            <label for="time" class="control-label col-sm-2">内容：</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="8"></textarea>
            </div>
        </div>
        <div class="text-center">
        	<button class="btn btn-lg btn-primary " type="submit ">提交</button>
        </div>
    </form>
</div>
</body>

</html>
<script>
	$(document).ready(function (argument) {
		$('#time').datetimepicker();
	})
</script>