<?php if (!defined('THINK_PATH')) exit();?><script src="/SportsWeb/sport/Public/js/angular.min.js"></script>
<style>
body {
    padding: 60px;
}
</style>
<div class="container">
    <table id="example" class="table table-striped table-bordered text-center" data-ng-app="app" data-ng-controller="ctrl">
        <caption>
            <h2 class="text-center">时刻管理</h2>
            <form class="form-inline">
                <div class="form-group">
                    <label for="search" class="control-label">搜索：</label>
                    <input type="text" placeholder="支持模糊搜索" data-ng-model="filterText" class="form-control">
                </div>
                <button class="btn btn-danger" id="delete"><span class="glyphicon glyphicon-minus"></span>删除</button>
                <a href="#">
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span>修改</button>
                </a>
                <button class="btn btn-warning" id="update" refresh><span class="glyphicon glyphicon-minus"></span>更新</button>
            </form>
        </caption>
        <thead>
            <tr>
                <th></th>
                <th class="text-center">id</th>
                <th class="text-center">name</th>
                <th class="text-center">地点</th>
                <th class="text-center">举办时间</th>
            </tr>
        </thead>
        <tbody>
            <tr data-ng-repeat="player in players | filter: filterText">
                <td>
                    <input type="checkbox" class="myCheck" value="{{player.id}}" />
                </td>
                <td data-ng-bind="player.id"></td>
                <td data-ng-bind="player.name"></td>
                <td data-ng-bind="player.where"></td>
                <td data-ng-bind="player.hosttime"></td>
            </tr>
        </tbody>
    </table>
</div>
</body>

</html>
<script>
var app = angular.module('app', []);
app.controller('ctrl', ['$scope', '$http', function($scope, $http) {
    $http.get("/SportsWeb/sport/index.php/Admin/Schedule/getSchedule").success(function(response) {
        $scope.players = JSON.parse(response.split(']')[0] + ']');
    });
}]);
app.directive('refresh', ['$scope', function($scope) {
    return {
        restrict: 'A',
        link: function($scope, element, attrs) {
            element.bind('click', function(argument) {
                $http.get("/SportsWeb/sport/index.php/Admin/Schedule/getSchedule").success(function(response) {
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
                $('#update').click();
            }
        })
    });
    $('#update').click(function(argument) {
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