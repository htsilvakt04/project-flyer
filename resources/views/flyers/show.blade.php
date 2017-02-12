@extends("layout")

@section("content")

<div class="row">
  <div class="col-md-4">
    <h1>{{ $flyer->street }}</h1>
    <h2>{{ $flyer->price }}</h2>
    <hr>

    <p>{{ $flyer->description }}</p>
  </div>

  <div class="col-md-8 gallery">
    @foreach ($flyer->photos->chunk(4) as $set)
      <div class="row">
        @foreach ($set as $photo)
          <div class="col-md-3 gallery_item">
            <form  action="/photos/{{$photo->id}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" name="button">Delete</button>
            </form>
            <a href="/{{ $photo->path }}" data-lity>
              <img src="/{{ $photo->thumbnail_path }}" alt="">
            </a>
          </div>
        @endforeach
      </div>
    @endforeach
    @if ($current_user && $current_user->owns($flyer))
      <hr>
      <h2>Add your photo</h2>
      <form id="addPhotosForm"
            class="dropzone"
            action="{{ route('store_photo_path', [$flyer->zip, $flyer->street]) }}"
            method="POST">
        {{ csrf_field() }}
      </form>
    @endif
  </div>
</div>




@stop
@section("scripts.footer")
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
  <script>
    Dropzone.options.addPhotosForm = {
      paramName: "photos", // The name that will be used to transfer the file
      maxFilesize: 3, // MB
      acceptedFiles: '.jpg, .png, .jpeg, .bmp'
    }
  </script>
@stop
