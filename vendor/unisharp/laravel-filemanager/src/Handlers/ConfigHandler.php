<?php

namespace UniSharp\LaravelFilemanager\Handlers;

use Illuminate\Support\Facades\Request;

class ConfigHandler
{
  public function userField()
  {
    //return auth()->id();
     return 'rider_' . session()->get('rider_id');

  }
}
