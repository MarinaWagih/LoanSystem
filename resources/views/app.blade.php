</<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>
    html, body {
        height: 100%;
    }

    body {
        margin: 0;
        padding: 0;
        width: 100%;
        display: table;


    }
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img alt="Loan System" src="">
            </a>

        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>   <a href="/auth/logout"><b>Logout</b></a></li>
            </ul>

    </div>
</nav>
	<div class='container-fluid'>
		@yield('content')
	</div>
</body>
</html>