<?php

namespace App\Http\Controllers;
use App\Helpers\IConstants;
use App\Helpers\Common;
use App\Models\Calculations;
use App\Models\Services;
use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {


    return view('content.dashboard');

  }

  public function settings(Request $request)
  {

    /*   if (!auth()->user()->hasPermissionTo('setting_view')) {
        abort(403, 'Unauthorized action.');
      } */
    /*    if (\Gate::check("isUser", \Auth::user())) {
         abort(404);
       } */

    if ($request->post('settings')) {

      foreach ($request->post('settings') as $key => $value) {
        //echo $key.'-'.$value;
        Settings::updateOrCreate(['name' => $key], ['name' => $key, 'value' => $value]);
        session()->flash('success', 'Settings updated successfully.');

      }
    }
    $settings = Settings::pluck('value', 'name');
    return view('content.settings', compact('settings'));
  }




}
