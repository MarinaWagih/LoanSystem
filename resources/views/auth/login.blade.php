<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
            background-image: url("../3.jpeg") ;
            background-repeat: no-repeat;
            background-size: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
        .title2 {
            font-size: 50px;
        }
        .label {
            font-size: 20px;
            width: 50px;
        }
        input,button{
            font-size: 20px;
        }
        .error{
            font-size: 40px;
            /*background-color: #ffffff;*/
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Loan System</div>
        <h2 class="title2">
            logIn
        </h2>
        <form method="POST" action="/auth/login">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="label"> Email</label>
                <br>
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label class="label"> Password</label>
                <br>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <input type="checkbox" name="remember"> Remember Me
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        @if (count($errors) > 0)
            <div>

                    @foreach ($errors->all() as $error)
                        <h3 class="error">{{ $error }}</h3>
                    @endforeach

            </div>
        @endif    </div>
</div>
</body>
</html>
