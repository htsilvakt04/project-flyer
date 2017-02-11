<?php
namespace App\Forms;
use App\Flyer;
use App\Photo;
use App\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class AddPhotoToFlyer
{
  protected $flyer;
  protected $file;

  public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null)
  {
    $this->flyer = $flyer;
    $this->file = $file;
    $this->thumbnail = $thumbnail ?: new Thumbnail;
  }

  public function save()
  {
    // attach the photo to the flyer
    $photo = $this->flyer->addPhoto($this->makePhoto());
    // move photo to images/photo folder
    $this->file->move($photo->baseDir(), $photo->name);
    // make thumb_nail_photo
    $this->thumbnail->make($photo->path, $photo->thumbnail_path);
  }
  public function makePhoto()
  {
    return new Photo ([
      "name" => $this->makeFileName(),
    ]);
  }

  public function makeFileName()
  {
    $name = sha1( time() . $this->file->getClientOriginalName() );
    $extension = $this->file->getClientOriginalExtension();
    return "{$name}.{$extension}";
  }

}
