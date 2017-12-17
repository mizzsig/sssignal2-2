<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
  </head>
  <body>
<header>
@yield('header')
</header>

<div class="main-img">
	<img src="http://blog-imgs-83.fc2.com/s/s/s/sssignal/header.png">
</div>

<div class="container">
<main>
@yield('main')
</main>

<div class="sub">
@yield('sub')
</div>
</div>
  </body>
</html>

