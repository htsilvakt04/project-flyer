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

    <script src="/js/libs.js"></script>
    @yield("scripts.footer")
    @include("flash")
  </body>
</html>
