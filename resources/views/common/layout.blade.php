<!DOCTYPE html>
<html lang="ja">
  <head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79013420-2"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-79013420-2');
		</script>
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

<script src="/js/jquery.js"></script>
<script src="/js/layout.js" async></script>
<!-- コードのハイライト用 -->
<script src="/js/prettify.js" async></script>
  </body>
</html>

