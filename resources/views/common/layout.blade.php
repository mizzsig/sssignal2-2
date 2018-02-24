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
		@yield('meta')
  </head>
  <body>
<header>
@yield('header')
</header>

<div class="main-img">
@yield('main-img')
</div>

<div class="container">
<main>
@yield('main')
</main>

<div class="sub">
@yield('sub')
</div>
</div>

@yield('script')
  </body>
</html>

