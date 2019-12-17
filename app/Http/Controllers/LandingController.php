<?php

namespace App\Http\Controllers;

use App\Landing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class LandingController extends Controller
{
  public function index()
  {
    $landing = Landing::all()->first();

    return response()->json(['landing' => $landing], 200);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'title_ar' => 'required|max:255',
      'subtitle' => 'required|max:255',
      'subtitle_ar' => 'required|max:255',
      'promo_image' => 'required',
      'apps_title' => 'required',
      'apps_title_ar' => 'required',
      'apps_subtitle' => 'required',
      'apps_subtitle_ar' => 'required',
      'apps_image' => 'required',
      'android_link' => 'required',
      'ios_link' => 'required',
    ]);

    try {
      $landing = Landing::all()->first();
      if (!$landing) {
        $landing = new Landing();
      }
      $landing->title = $request->title;
      $landing->title_ar = $request->title_ar;
      $landing->subtitle = $request->subtitle;
      $landing->subtitle_ar = $request->subtitle_ar;
      $landing->promo_image = $request->promo_image;
      $landing->apps_title = $request->apps_title;
      $landing->apps_title_ar = $request->apps_title_ar;
      $landing->apps_subtitle = $request->apps_subtitle;
      $landing->apps_subtitle_ar = $request->apps_subtitle_ar;
      $landing->apps_image = $request->apps_image;
      $landing->android_link = $request->android_link;
      $landing->ios_link = $request->ios_link;
      $landing->setUpdatedAt(Date::now());


      $landing->save();

      return response()->json(['landing' => $landing]);
    } catch (\Exception $exception) {
      return response()->json(['error' => 'Could not update landing'], 500);
    }
  }

}
