<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Project Flyer</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/libs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  </head>
  <body>

    @include("partials.nav")

    <div class="container">
      @yield("content")
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="/js/libs.js"></script>
    @yield("scripts.footer")
    @include("flash")
  </body>
</html>
