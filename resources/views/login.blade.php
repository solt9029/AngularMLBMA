<html>
    <head>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    	<title>MLBMA</title>
    </head>
    <body>
		<nav class="navbar navbar-default">
		    <div class="container">
		        <div class="navbar-header">
		            <!-- スマホやタブレットで表示した時のメニューボタン -->
		            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		 
		            <!-- ブランド表示 -->
		            <a class="navbar-brand" href="/">MLBMA</a>
		        </div>
		 
		        <!-- メニュー -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		 
		            <!-- 左寄せメニュー -->
		            <ul class="nav navbar-nav">
		                <li></li>
		                <li><a href="/contact">Contact</a></li>
		                <li><a href="/about">About</a></li>
		            </ul>
		 
		            <!-- 右寄せメニュー -->
		            <ul class="nav navbar-nav navbar-right">
		 
		                @if (Auth::guest())
		                    {{-- ログインしていない時 --}}
		 
		                    <li><a href="/auth/login">Login</a></li>
		                    <li><a href="/auth/register">Register</a></li>
		                @else
		                    {{-- ログインしている時 --}}
		 
		                    <!-- ドロップダウンメニュー -->
		                    <li class="dropdown">
		                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		                            {{ Auth::user()->name }}
		                            <span class="caret"></span>
		                        </a>
		                        <ul class="dropdown-menu" role="menu">
		                            <li><a href="/auth/logout">Logout</a></li>
		                        </ul>
		                    </li>
		                @endif
		            </ul>
		        </div><!-- /.navbar-collapse -->
		    </div><!-- /.container-fluid -->
		</nav>
        <a href="auth/twitter/login">twitter login</a>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
