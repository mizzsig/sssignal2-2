<!DOCTYPE html>
<html lang="ja">
  <head>
@if ($_SERVER['REMOTE_ADDR'] != $_ENV['TOERA_IP'])
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-79013420-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-79013420-2');
    </script>
@endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('main')
    @yield('script')
  </body>
</html>

