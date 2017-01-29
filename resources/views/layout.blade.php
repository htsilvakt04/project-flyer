<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Project Flyer</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    @include("partials.nav")

    <div class="container">
      @yield("content")
    </div>
  </body>
</html>
