<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChannelController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $channels = Channel::all();

    return response()->json(['channels' => $channels]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required',
      'url' => 'required',
      'image' => 'required',
      'category_id' => 'required',
    ]);


    try {
      $channel = new Channel();
      $channel->name = $request->name;
      $channel->image = $request->image;
      $channel->url = $request->url;
      $channel->category_id = $request->category_id;

      $channel->save();

      return response()->json(['channel' => $channel, 'status' => 'created']);
    } catch (\Exception $exception) {
      return response()->json(['error' => 'Could not create a new channel'], 500);
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Channel  $channel
   * @return \Illuminate\Http\Response
   */
  public function show(Channel $channel)
  {
    return response()->json(['channel' => $channel]);
  }



  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Channel  $channel
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Channel $channel)
  {
    $request->validate([
      'name' => 'required',
      'url' => 'required',
      'image' => 'required',
      'category_id' => 'required',
    ]);

    if ($request->image) {
      Storage::disk('public')->delete($channel->image);
    }

    $channel->name = $request->name;
    $channel->image = $request->image;
    $channel->url = $request->url;
    $channel->category_id = $request->category_id;

    $channel->save();

    return response()->json(['channel' => $channel]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Channel  $channel
   * @return \Illuminate\Http\Response
   */
  public function destroy(Channel $channel)
  {
    try {
      $image_url = $channel->image;
      Storage::disk('public')->delete($image_url);

      if ($channel->delete()) {
        return response()->json(['status' => 'deleted']);
      }
    } catch (\Exception $e) {
      return response()->json(['error' => 'Cannot delete channel'], 400);
    }
  }
}
