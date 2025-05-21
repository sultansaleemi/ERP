<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Settings;


class SettingsController extends Controller
{
    public function index()
    {
        // Fetch the current settings (including the logo)
        $setting = Settings::first();
        return view('settings.index', compact('settings'));

        $settings = $request->input('settings');

    foreach ($settings as $name => $value) {
        DB::table('settings')->updateOrInsert(
            ['name' => $name],
            ['value' => $value]
        );

        $settings = Settings::pluck('value', 'name')->toArray();
        return view('settings', compact('settings'));
    }

    return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function updateLogo(Request $request) {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/logos/' . $filename;
    
            // Move the file to public/uploads/logos
            $file->move(public_path('uploads/logos'), $filename);
    
            // Save path in DB (assuming only 1 row in settings table)
            DB::table('settings')->updateOrInsert(['id' => 1], [
                'logo' => $path
            ]);
        }
    
        return back()->with('success', 'Logo updated successfully!');


        $settings = [];
        if ($request->hasFile('settings.logo')) {
            $file = $request->file('settings.logo');
            $path = $file->store('logos', 'public');
            $settings['logo'] = $path;
        } elseif ($request->input('settings.logo_path')) {
            $settings['logo'] = $request->input('settings.logo_path');
        }
        foreach ($settings as $key => $value) {
            DB::table('settings')->updateOrInsert(['name' => $name], ['value' => $value]);
        }
        return redirect()->back()->with('success', 'Logo updated successfully.');
    }
    public function store(Request $request)
    {
        $settings = $request->input('settings', []);
        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }
        return redirect()->back()->with('success', 'Settings saved!');
   


   

    
}

public function updateFavicon(Request $request)
{
    $request->validate([
        'favicon' => 'required|image|mimes:ico,png,jpg,jpeg|max:2048', // Max 2MB
    ]);

    if ($request->hasFile('favicon')) {
        $favicon = $request->file('favicon');
        $faviconName = 'favicon.' . $favicon->getClientOriginalExtension();
        $favicon->move(public_path('assets/img/favicon'), $faviconName);
        $faviconPath = 'assets/img/favicon/' . $faviconName;

        // Update or insert the favicon path in the settings table
        DB::table('settings')->updateOrInsert(
            ['name' => 'favicon'],
            ['value' => $faviconPath, 'updated_at' => now()]
        );
    }

    return redirect()->back()->with('success', 'Favicon updated successfully.');
}


}

// <form action="{{ route('settings.updateLogo') }}" method="POST" enctype="multipart/form-data">
          

// </form>
// @php
// $logoPath = DB::table('settings')->value('logo');
// @endphp

// @if ($logoPath)
// <div class="current-logo mb-3">

// <img src="{{ asset($logoPath) }}" alt="Organization Logo" style="max-height: 100px;">
// </div>
// @else
// <p>No logo has been uploaded yet.</p>
// @endif


// <!-- Form to upload a new logo -->
// <form action="{{ route('settings.updateLogo') }}" method="POST" enctype="multipart/form-data">
// @csrf
// <div class="form-group">
//     <label for="logo">Upload New Logo:</label>
    
//     <input type="file" name="logo" id="logo" class="form-control" accept="image/*" required >
// </div><br>
// <button type="submit" class="btn btn-primary">Save Logo</button>
// </form>