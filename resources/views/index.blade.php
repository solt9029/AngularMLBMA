<html ng-app="app">
    <head>
    	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
    	<script src="js/min/app.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>
        </style>
    </head>

    <body ng-controller="BooksController">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">MLBMA</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/auth/twitter/logout">logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <form name="form" ng-submit="register()">
    		    <input class="form-control" type="text" name="isbn" ng-model="isbn" ng-minlength="13" ng-maxlength="13"  style="margin-bottom:10px">
                <input class="btn btn-primary btn-block" type="submit" value="register">
            </form>

    		<div class="alert alert-danger" ng-show="error">@{{error}}</div>
            <div class="alert alert-danger" ng-show="form.isbn.$error.minlength || form.isbn.$error.maxlength">13文字です</div>

            <div class="book-list" style="margin-top:50px">
            <select class="form-control" ng-model="whose">
                <option value="mine" selected="true">自分の本</option>
                <option value="ours">皆の本</option>
            </select>

    		<table class="table" style="margin-top:10px">
    			<tr>
    				<th>ISBN</th><th>書籍名</th><th>中野図書館</th><th></th>
    			</tr>
    			<tr ng-repeat="book in books | filter:user_filter()">
    				<td>@{{book.isbn}}</td><td>@{{book.name}}</td><td>@{{book.state}}</td><td><button class="btn" ng-click="delete(book.id)">削除</button></td>
    			</tr>
    		</table></div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
