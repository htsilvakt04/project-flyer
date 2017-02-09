<?php

namespace App\Http\Controllers;
use App\Photo;
use App\Flyer;
use App\Http\Requests\FlyerRequest;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
class FlyersController extends Controller
{
    public function __construct()
    {
      $this->middleware("auth", ["except"=>["show"]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("flyers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {

        //Create a Flyer record
        Flyer::create($request->all());


        //Flash success message
        flash()->success("Succeess!", "Your flyer has been created.");

        //Redirect
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);
        return view("flyers.show", compact("flyer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function addPhoto($zip, $street,Request  $request)
    {
      // validaTE
      $this->validate($request, [
        "photos" => "required|mimes:jpg,jpeg,png,bmp"
      ]);
      // new up new Photo instance and basedir and move file
      $photo = Photo::formFrom($request->file("photos"))->store();

      Flyer::locatedAt($zip, $street)->addPhoto($photo);
    }
    public function makePhoto(UploadedFile $file)
    {

    }


}
