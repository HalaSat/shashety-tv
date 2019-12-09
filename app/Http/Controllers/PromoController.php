<?php

namespace App\Http\Controllers;

use App\Promo;
use Illuminate\Http\Request;

class PromoController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $promos = Promo::all();

    return response()->json(['promos' => $promos]);
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
      'title' => 'required',
      'subtitle' => 'required',
      'image' => 'required'
    ]);

    try {
      $promo = new Promo();
      $promo->title = $request->title;
      $promo->subtitle = $request->subtitle;
      $promo->image = $request->image;

      $promo->save();

      return response()->json(['promo' => $promo, 'status' => 'created']);

    } catch (\Exception $exception) {
      return response()->json(['error' => 'Could not create a new promo'], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Promo $promo
   * @return \Illuminate\Http\Response
   */
  public function show(Promo $promo)
  {
    return response()->json(['promo' => $promo]);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Promo $promo
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Promo $promo)
  {
    $request->validate([
      'title' => 'required',
      'subtitle' => 'required',
      'image' => 'required'
    ]);

    $promo->title = $request->title;
    $promo->subtitle = $request->subtitle;
    $promo->image = $request->image;

    $promo->save();

    return response()->json(['promo' => $promo]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Promo $promo
   * @return \Illuminate\Http\Response
   */
  public function destroy(Promo $promo)
  {
    try {

      if ($promo->delete()) {
        return response()->json(['status' => 'deleted']);
      }

    } catch (\Exception $e) {
      return response()->json(['error' => 'Cannot delete promo'], 400);
    }
  }
}
