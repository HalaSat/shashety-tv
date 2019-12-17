<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
  public function uploadFile(Request $request)
  {
    $file = $request->file('file');

    if ($file) {
      $fullName = $file->getClientOriginalName();
      $name = substr($fullName, 0, strpos($fullName, '.'));
      $filePath = Storage::disk('public')->put("images/$name", $file);
      return response()->json(['path' => '/storage/'. $filePath]);
    }

    return response()->json(['error' => 'No file uploaded'], 400);
  }
}
