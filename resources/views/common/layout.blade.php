<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
  </head>
  <body>
<header>
@yield('header')
</header>

<div class="main-img">
	<img src="/images/header.png">
</div>

<div class="container">
<main>
@yield('main')
</main>

<div class="sub">
@yield('sub')
</div>
</div>

<script src="/js/jquery.js" async></script>
<script src="/js/layout.js" async></script>
  </body>
</html>

