@extends("layout")
@section("content")
  <h1>Selling your home?</h1>

  <hr>

  <form class="" action="/flyers" method="post" enctype="multipart/form-data">
    @include("partials.form");
  </form>

@stop
