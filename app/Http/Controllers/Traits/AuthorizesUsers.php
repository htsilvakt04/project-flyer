<?php
namespace App\Http\Controllers\Traits;
use illuminate\Http\Request;
use App\Flyer;
use Illuminate\Support\Facades\Auth;

trait AuthorizesUsers {
  public function unauthorized(Request $request)
  {
    if ($request->ajax()) {
      return response("No way!", 403);
    }

    flash()->error("No way","You don't have the permition to access this page");

    return redirect("/");
  }

  public function userCredtedFlyer(Request $request)
  {
    return Flyer::where([
      "zip" => $request->zip,
      "street" => $request->street,
      "user_id" => Auth::user()->id
    ])->exists();
  }

}
