<!DOCTYPE html>
<html>
<head>
    <title>404 | Chopbox</title>

    <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet"
          type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            height: auto;
            background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url(../img/404.jpg) no-repeat center center;
            background-size: cover;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        h1 {
            font-size: 140px;
            line-height: 1em;
            text-transform: uppercase;
            letter-spacing: -2px;
            font-weight: 500;
            font-style: normal;
            color: #fff;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        p {
            font-size: 22px;
            color: #fff;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            border: 1px solid #ffffff;
            color: #ffffff;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 500;
            font-style: normal;
            background: transparent;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1 style="display: inline-block;">404</h1>
        <p>My most humble apology, we no longer has't that </p>

        <form action="{{ url('/') }}">
            <button type="submit" class="title">
                GO HOME
            </button>
        </form>

    </div>
</div>
</body>
</html>