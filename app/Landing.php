<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
  protected $fillable = [
    'title',
    'subtitle',
    'promo_image',
    'apps_title',
    'apps_subtitle',
    'apps_image',
    'android_link',
    'ios_link'
  ];
}
