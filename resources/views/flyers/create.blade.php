@extends("layout")
@section("content")
  <h1 class="text-center">Selling your home?</h1>

  <hr>

  <form id="flyer-create" action="/flyers" method="post" enctype="multipart/form-data">
    @include("partials.form")
  </form>

@stop
