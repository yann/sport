<?php if (!defined('THINK_PATH')) exit();?><script src="/SportsWeb/sport/Public/js/angular.min.js"></script>
<style>
body {
    padding: 60px;
}
</style>
<div class="container">
    <table id="example" class="table table-striped table-bordered text-center" data-ng-app="app" data-ng-controller="ctrl">
        <caption>
            <h2 class="text-center">新闻管理</h2>
            <form class="form-inline">
                <div class="form-group">
                    <label for="search" class="control-label">搜索：</label>
                    <input type="text" placeholder="支持模糊搜索" data-ng-model="filterText" class="form-control">
                </div>
                <a href="addNews.html">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>添加</button>
                </a>
                <button class="btn btn-danger" id="delete"><span class="glyphicon glyphicon-minus"></span>删除</button>
                <a href="#">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>修改</button>
                </a>
                <button class="btn btn-warning" id="refresh" refresh><span class="glyphicon glyphicon-minus"></span>更新</button>
            </form>
        </caption>
        <thead>
            <tr>
                <th></th>
                <th class="text-center">学号</th>
                <th class="text-center">姓名</th>
                <th class="text-center">班级</th>
                <th class="text-center">年级</th>
                <th class="text-center">academy</th>
                <th class="text-center">性别</th>
                <th class="text-center">项目</th>
            </tr>
        </thead>
        <tbody>
            <tr data-ng-repeat="player in players | filter: filterText">
                <td>
                    <input type="checkbox" class="myCheck" value="{{player.id}}" />
                </td>
                <td data-ng-bind="player.id"></td>
                <td data-ng-bind="player.name"></td>
                <td data-ng-bind="player.classid"></td>
                <td data-ng-bind="player.grade"></td>
                <td data-ng-bind="player.academy"></td>
                <td data-ng-bind="player.sex"></td>
                <td data-ng-bind="player.project"></td>
            </tr>
        </tbody>
    </table>
</div>
</body>

</html>
<script>
var app = angular.module('app', []);
app.controller('ctrl', ['$scope', '$http', function($scope, $http) {
    $http.get("/SportsWeb/sport/index.php/Admin/News/getPlayer").success(function(response) {
        $scope.players = JSON.parse(response.split(']')[0] + ']');
    });
}]);
app.directive('refresh', ['$scope', function($scope) {
    return {
        restrict: 'A',
        link: function($scope, element, attrs) {
            element.bind('click', function(argument) {
                $http.get("/SportsWeb/sport/index.php/Admin/News/getPlayer").success(function(response) {
                    $scope.players = JSON.parse(response.split(']')[0] + ']');
                    $digest();
                });
            })
        }
    }
}]);
$(document).ready(function(argument) {
    $('#delete').click(function(argument) {
        var arr = [];
        for (var i = 0; i < $('.myCheck').length; i++) {
            if ($('.myCheck').eq(i).is(':checked')) {
                arr.push($('.myCheck').eq(i).val());
            }
        }
        $.ajax({
            url: '',
            type: 'POST',
            dataType: String.toString(arr),
            success: function(argument) {
                $('#refresh').click();
            }
        })
    });
    $('#delete').click(function(argument) {
        var arr;
        for (var i = 0; i < $('.myCheck').length; i++) {
            if ($('.myCheck').eq(i).is(':checked')) {
                arr.push($('.myCheck').eq(i).val());
                break;
            }
        }
        $.ajax({
            url: '',
            type: 'POST',
            dataType: arr,
            success: function (argument) {
            	// body...
            }
        })
    });
});
</script>