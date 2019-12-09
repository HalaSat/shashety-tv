<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categorys = Category::all();

    return response()->json(['categorys' => $categorys]);
  }

  public function getChannels(Request $request) {
    $category = Category::find($request->id);
    $channels =  $category->channels;
    return response()->json(['category' => $category->name,'channels' => $channels]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate(['name' => 'required']);

    try {
      $category = new Category();
      $category->name = $request->name;

      $category->save();

      return response()->json(['category' => $category, 'status' => 'created']);

    } catch (\Exception $exception) {
      return response()->json(['error' => 'Could not create a new category'], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    return response()->json(['category' => $category]);
  }



  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $request->validate(['name' => 'required']);

    $category->name = $request->name;

    $category->save();

    return response()->json(['category' => $category]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    try {

      if ($category->delete()) {
        return response()->json(['status' => 'deleted']);
      }

      return response()->json(['error' => 'not found'],404);
    } catch (\Exception $e) {
      return response()->json(['error' => 'Cannot delete category'], 400);
    }
  }
}
