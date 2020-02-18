<?php

namespace App\Http\Controllers;

use App\Vote;
use App\VotePost;
use Illuminate\Http\Request;

class VoteController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function index()
  {
    $votes = Vote::all()->lazy();

    return response()->json(['votes' => $votes, 'count' => $votes->count()]);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function store(Request $request)
  {
    $vote_post = VotePost::first();

    $votes = Vote::where('address', $request->ip(), 'and')->where('vote_post_id', $vote_post->id)->first();

    if (!$votes) {

      $vote = new Vote();


      $vote->name = $request->name;
      $vote->address = $request->ip();
      $vote->vote_post_id = $vote_post->id;
      $vote->vote = $request->vote;

      $vote->save();

      return response()->json(['status' => 'created', 'vote' => $vote]);
    } else {
      return response()->json(['status' => 'failed', 'error' => 'already voted']);
    }

  }


  /**
   * Display the specified resource.
   *
   * @param \App\Vote $vote
   * @return \Illuminate\Http\JsonResponse
   */
  public function show(Vote $vote)
  {
    return response()->json(['vote' => $vote]);
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Vote $vote
   * @return \Illuminate\Http\Response
   */
  public function edit(Vote $vote)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Vote $vote
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Vote $vote)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Vote $vote
   * @return \Illuminate\Http\Response
   */
  public function destroy(Vote $vote)
  {
    //
  }
}
