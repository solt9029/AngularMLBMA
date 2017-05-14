let app=angular.module("app",[]);

app.controller("BooksController",["$scope","$http",function($scope,$http){

	$scope.error="";

	let user_id;

	$http({
		method:"GET",
		url:"users/user_id"
	}).success(function(data,status,headers,config){
		user_id=data;
	});

	let showBooks=()=>{
		$http({
			method:"POST",
			url:"books/show",
		}).success(function(data,status,headers,config){
			$scope.books=data;
			for(let i=0; i<$scope.books.length; i++){
				$http({
					method:"POST",
					url:"books/state",
					data:{isbn:$scope.books[i].isbn,campus:"nakano"}
				}).success(function(data,status,headers,config){
					$scope.books[i].state=data;
				});	
			}
		});
	};

	$scope.whose="mine";

	$scope.user_filter=()=>{
		switch($scope.whose){
			case "mine":
				return {user_id:user_id};
			case "ours":
				return;
			default:
				return;
		}
	}

	showBooks();

	$scope.register=()=>{
		//登録する
		$http({
			method:"POST",
			url:"books/register",
			data:{isbn:$scope.isbn}
		}).success(function(){
			$scope.isbn="";
			$scope.error="";
			showBooks();
		}).error(function(){
			$scope.error="登録できませんでした";
		});
	};

	$scope.delete=(id)=>{
		$http({
			method:"POST",
			url:"books/delete",
			data:{id:parseInt(id)}
		}).success(function(data,status,headers,config){
			showBooks();
		});
	};

}]);