<?php

namespace App\Http\Controllers;

use App\HomePromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class HomePromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $homePromo = HomePromo::first();

      return response()->json(['home_promo' => $homePromo], 200);
    }


    public function store(Request $request)
    {
      $request->validate([
      'title' => 'required|max:255',
      'promo_image' => 'required',
      'channel_id' => 'required',
      'channel_logo' => 'required',
    ]);

      try {
        $homePromo = HomePromo::first();
        if (!$homePromo) {
          $homePromo = new HomePromo();
        }
        $homePromo->title = $request->title;
        $homePromo->promo_image = $request->promo_image;
        $homePromo->channel_id = $request->channel_id;
        $homePromo->channel_logo = $request->channel_logo;
        $homePromo->setUpdatedAt(Date::now());

        $homePromo->save();

        return response()->json(['home_promo' => $homePromo]);
      } catch (\Exception $exception) {
        return response()->json(['error' => 'Could not update promo'], 500);
      }
    }

}
