<?php

namespace App\Helpers;
use App\Models\Services;
use App\Models\Settings;

class Common
{

  public static function getSetting($setting_name)
  {

    return Settings::where('name', $setting_name)->value('value');

  }

  /*  public static function settings()
   {
     return Settings::all()->pluck('value', 'name');
   } */

  public static function settings($key = null, $default = null)
  {
    $settings = cache()->rememberForever('settings', function () {
      return Settings::pluck('value', 'name')->toArray();
    });

    return $key ? ($settings[$key] ?? $default) : $settings;
  }

  public static function Status($id = null)
  {
    $steps = [
      1 => 'Call',
      2 => 'Meeting',
      3 => 'Message',
      4 => 'Email',
      5 => 'Close',
      6 => 'Transfer',
      7 => 'Re Marketing',
      8 => 'Re Qualify',
      9 => 'Duplicate',
      10 => 'Generate Sale',
    ];
    if ($id) {
      return $steps[$id];
    } else {
      return $steps;
    }
  }

  public static function AccountTypes($id = null)
  {
    $types = [
      'Asset' => 'Asset',
      'Liability' => 'Liability',
      'Equity' => 'Equity',
      'Revenue' => 'Revenue',
      'Expense' => 'Expense'

    ];
    if ($id) {
      return $types[$id];
    } else {
      return $types;
    }
  }




  public static function DateFormat($date)
  {
    return date('d M Y', strtotime($date));

  }

  public static function DateTimeFormat($date)
  {
    return date('d M Y h:i A', strtotime($date));

  }
}
