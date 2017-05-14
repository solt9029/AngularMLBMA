"use strict";

var app = angular.module("app", []);

app.controller("BooksController", ["$scope", "$http", function ($scope, $http) {

	$scope.error = "";

	var user_id = void 0;

	$http({
		method: "GET",
		url: "users/user_id"
	}).success(function (data, status, headers, config) {
		user_id = data;
	});

	var showBooks = function showBooks() {
		$http({
			method: "POST",
			url: "books/show"
		}).success(function (data, status, headers, config) {
			$scope.books = data;

			var _loop = function _loop(i) {
				$http({
					method: "POST",
					url: "books/state",
					data: { isbn: $scope.books[i].isbn, campus: "nakano" }
				}).success(function (data, status, headers, config) {
					$scope.books[i].state = data;
				});
			};

			for (var i = 0; i < $scope.books.length; i++) {
				_loop(i);
			}
		});
	};

	$scope.whose = "mine";

	$scope.user_filter = function () {
		switch ($scope.whose) {
			case "mine":
				return { user_id: user_id };
			case "ours":
				return;
			default:
				return;
		}
	};

	showBooks();

	$scope.register = function () {
		//登録する
		$http({
			method: "POST",
			url: "books/register",
			data: { isbn: $scope.isbn }
		}).success(function () {
			$scope.isbn = "";
			$scope.error = "";
			showBooks();
		}).error(function () {
			$scope.error = "登録できませんでした";
		});
	};

	$scope.delete = function (id) {
		$http({
			method: "POST",
			url: "books/delete",
			data: { id: parseInt(id) }
		}).success(function (data, status, headers, config) {
			showBooks();
		});
	};
}]);
//# sourceMappingURL=app.es5.js.map
