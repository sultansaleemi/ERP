<?php

namespace App\Providers;

use App\Helpers\Common;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Helpers\IConstants;
use App\Models\Settings; 
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
    Gate::before(function ($user, $ability) {
      return $user->hasRole(IConstants::ROLE_SUPER_ADMIN) ? true : null;
    });

    View::share('settings', Common::settings());

    // $this->registerPolicies();

    $logoPath = DB::table('settings')->value('logo');
    $logoUrl = $logoPath ? asset($logoPath) : asset('images/default-logo.png');

    // Get organization name from 'name' column with 'value'
    $orgName = DB::table('settings')->where('name', 'organization_name')->value('value');

    View::share('organizationName', $orgName ?? 'My Organization');

    View::share('appLogo', $logoUrl);

    $location = DB::table('settings')->where('name', 'business_location')->value('value');
    $addressLine = DB::table('settings')->where('name', 'address_line_1')->value('value');
    $city = DB::table('settings')->where('name', 'city')->value('value');
    $province = DB::table('settings')->where('name', 'province')->value('value');
    $postalCode = DB::table('settings')->where('name', 'postal_code')->value('value');

    $formattedAddress = collect([
      $location,
      $addressLine,
      trim("{$city}" . ($city && $province ? ', ' : '') . "{$province}"),
      trim("{$location}" . ($location && $postalCode ? ' – ' : '') . "{$postalCode}")
  ])->filter()->implode("\n");
  
  View::share('organizationAddress', $formattedAddress);

  $tagline = DB::table('settings')->where('name', 'tagline')->value('value');

  View::share('organizationTagline', $tagline);

  $favicon = DB::table('settings')->where('name', 'favicon')->value('value');

  View::share('organizationFavicon', $favicon);
        
  }
}
