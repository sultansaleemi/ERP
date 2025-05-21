@extends('layouts.app')
@section('title','Settings')

@section('content')

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .input-group-text {
        width: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .section-icon {
        margin-right: 8px;
        font-size: 1.2rem;
        vertical-align: middle;
    }
    .form-control {
        border: 1px solid #eee !important;
    }
    .logo-set {
        display: flex;
    }
    .current-logo.mb-3 {
        padding-right: 40px;
    }
    .col-md-6.left-side {
        display: flex;
        justify-content: space-evenly;
    }
    button.btn.waves-effect.waves-light {
        border: 1px solid #eeee;
    }
    .card-header {
        border-bottom: 1px solid #eee;
    }
    .card .card-header + .card-body, .card .card-header + .card-content > .card-body:first-of-type, .card .card-body + .card-footer {
        padding-top: 24px;
    }
    label.form-label {
        font-size: 16px;
    }
    .form-label i {
        color: #4a90e2;
        margin-right: 8px;
    }

.favicon-set{
    display: flex
;
}
</style>

<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Application Settings</h4>
    </div>
    <div class="">
    </div>
</div>
<!-- Logo Upload Form -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Branding</h4>
    </div>
    <div class="card-body">
        <div class="logo-set col-md-12">
            <div class="col-md-6">
                <label for="logo" class="form-label"><i class="bi bi-image"></i> Organization Logo</label>
            </div>
            <div class="col-md-6 left-side">
                @php
                    $logoPath = DB::table('settings')->value('logo');
                @endphp
                @if ($logoPath)
                <div class="current-logo mb-3">
                    <img id="logoPreview" src="{{ asset($logoPath) }}" alt="Organization Logo" style="max-height: 100px; display: block;">
                </div>
                @else
                <p>No logo has been uploaded yet.</p>
                @endif

                <form action="{{ route('settings.updateLogo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*" onchange="previewLogo(event)">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Logo</button>
                </form>
            </div>
            
        </div>
        
        <div class="col-md-12">
        <div class="favicon-set col-md-12 mt-4">
            <div class="col-md-6">
                <label for="favicon" class="form-label"><i class="bi bi-browser-chrome"></i> Favicon</label>
            </div>
            <div class="col-md-6 left-side">
                @php
                    $faviconPath = DB::table('settings')->where('name', 'favicon')->value('value');
                @endphp
                @if ($faviconPath)
                <div class="current-favicon mb-3">
                    <img id="faviconPreview" src="{{ asset($faviconPath) }}" alt="Favicon" style="max-height: 32px; display: block;">
                </div>
                @else
                <p>No favicon</p>
                @endif

                <form action="{{ route('settings.updateFavicon') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="file" name="favicon" id="favicon" class="form-control" accept="image/x-icon,image/png,image/jpeg" onchange="previewFavicon(event)">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Favicon</button>
                </form>
            </div>
        </div>
        </div>
        {!! Form::open(['route'=>'settings', 'method'=>'post']) !!}
@csrf

        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <label for="theme_preference" class="form-label"><i class="bi bi-palette"></i> Theme Preference</label>
                <div class="input-group">
        <select name="settings[theme_preference]" id="theme_preference" class="form-control">
            <option value="light" {{ ($settings['theme_preference'] ?? '') == 'light' ? 'selected' : '' }}>Light</option>
            <option value="dark" {{ ($settings['theme_preference'] ?? '') == 'dark' ? 'selected' : '' }}>Dark</option>
        </select>
    </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tagline" class="form-label"><i class="bi bi-quote"></i> Tagline</label>
                <div class="input-group">
                    <input type="text" name="settings[tagline]" class="form-control" value="{{ $settings['tagline'] ?? '' }}" placeholder="e.g., Empowering Your Future" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Settings Form -->
<!-- {!! Form::open(['route'=>'settings', 'method'=>'post']) !!}
@csrf -->

<!-- General Settings Section -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">General Settings</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="organization_name" class="form-label"><i class="bi bi-building"></i> Organization Name</label>
                <div class="input-group">
                    <input type="text" name="settings[organization_name]" class="form-control" value="{{ $settings['organization_name'] ?? '' }}" required />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="organization_email" class="form-label"><i class="bi bi-envelope"></i> Organization Email</label>
                <div class="input-group">
                    <input type="email" name="settings[organization_email]" class="form-control" value="{{ $settings['organization_email'] ?? '' }}" required />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="organization_phone" class="form-label"><i class="bi bi-telephone"></i> Organization Phone</label>
                <div class="input-group">
                    <input type="text" name="settings[organization_phone]" class="form-control" value="{{ $settings['organization_phone'] ?? '' }}" pattern="\+?[0-9]{10,15}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="fiscal_year_start" class="form-label"><i class="bi bi-calendar"></i> Fiscal Year Start</label>
                <div class="input-group">
                    <input type="date" name="settings[fiscal_year_start]" class="form-control" value="{{ $settings['fiscal_year_start'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="report_base" class="form-label"><i class="bi bi-bar-chart"></i> Report Base</label>
                <div class="input-group">
                    
                    <select name="settings[theme_preference]" class="form-control">
    <option value="light" {{ ($settings['theme_preference'] ?? '') == 'light' ? 'selected' : '' }}>Light</option>
    <option value="dark" {{ ($settings['theme_preference'] ?? '') == 'dark' ? 'selected' : '' }}>Dark</option>
</select>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="company_id" class="form-label"><i class="bi bi-card-text"></i> Organization ID</label>
                <div class="input-group">
                    <input type="text" name="settings[company_id]" class="form-control" value="{{ $settings['company_id'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="tax_id" class="form-label"><i class="bi bi-receipt"></i> Organization Tax ID</label>
                <div class="input-group">
                    <input type="text" name="settings[tax_id]" class="form-control" value="{{ $settings['tax_id'] ?? '' }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="company_size" class="form-label"><i class="bi bi-people"></i> Company Size</label>
                <div class="input-group">
                    <select name="settings[company_size]" class="form-control">
                        <option value="small" {{ ($settings['company_size'] ?? '') == 'small' ? 'selected' : '' }}>Small (1-50 employees)</option>
                        <option value="medium" {{ ($settings['company_size'] ?? '') == 'medium' ? 'selected' : '' }}>Medium (51-250 employees)</option>
                        <option value="large" {{ ($settings['company_size'] ?? '') == 'large' ? 'selected' : '' }}>Large (251+ employees)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="founded_date" class="form-label"><i class="bi bi-calendar-check"></i> Founded Date</label>
                <div class="input-group">
                    <input type="date" name="settings[founded_date]" class="form-control" value="{{ $settings['founded_date'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="website" class="form-label"><i class="bi bi-link"></i> Website</label>
                <div class="input-group">
                    <input type="url" name="settings[website]" class="form-control" value="{{ $settings['website'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="fax" class="form-label"><i class="bi bi-printer"></i>Office Number</label>
                <div class="input-group">
                    <input type="text" name="settings[fax]" class="form-control" value="{{ $settings['fax'] ?? '' }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Industry & Business Type Section -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Industry & Business Type</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="industry" class="form-label"><i class="bi bi-gear"></i> Industry</label>
                <div class="input-group">
                    <select name="settings[industry]" class="form-control">
                        <option value="Information Technology" {{ ($settings['industry'] ?? '') == 'Information Technology' ? 'selected' : '' }}>Information Technology</option>
                        <option value="Healthcare" {{ ($settings['industry'] ?? '') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                        <option value="Finance" {{ ($settings['industry'] ?? '') == 'Finance' ? 'selected' : '' }}>Finance</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="business_type" class="form-label"><i class="bi bi-briefcase"></i> Business Type</label>
                <div class="input-group">
                    <select name="settings[business_type]" class="form-control">
                        <option value="Private" {{ ($settings['business_type'] ?? '') == 'Private' ? 'selected' : '' }}>Private</option>
                        <option value="Public" {{ ($settings['business_type'] ?? '') == 'Public' ? 'selected' : '' }}>Public</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Address Details Section -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Address Details</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="business_location" class="form-label"><i class="bi bi-globe"></i> Business Location (Country)</label>
                <div class="input-group">
                    <select name="settings[business_location]" id="business_location" class="form-control select2">
                        <option value="">Select Country</option>
                        @foreach(config('countries') as $country)
                            <option value="{{ $country }}" {{ ($settings['business_location'] ?? '') == $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="state" class="form-label"><i class="bi bi-map"></i> State</label>
                <div class="input-group">
                    <input type="text" name="settings[state]" class="form-control" value="{{ $settings['state'] ?? '' }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="city" class="form-label"><i class="bi bi-building"></i> City</label>
                <div class="input-group">
                    <input type="text" name="settings[city]" class="form-control" value="{{ $settings['state'] ?? '' }}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="province" class="form-label"><i class="bi bi-geo-alt"></i> Province</label>
                <div class="input-group">
                    <input type="text" name="settings[province]" class="form-control" value="{{ $settings['province'] ?? '' }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="postal_code" class="form-label"><i class="bi bi-mailbox"></i> Postal Code</label>
                <div class="input-group">
                    <input type="text" name="settings[postal_code]" class="form-control" value="{{ $settings['postal_code'] ?? '' }}" pattern="\d{5}" />
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="address_line_1" class="form-label"><i class="bi bi-geo"></i> Address Line 1</label>
                <div class="input-group">
                    <input type="text" name="settings[address_line_1]" class="form-control" value="{{ $settings['address_line_1'] ?? '' }}" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="address_line_2" class="form-label"><i class="bi bi-geo"></i> Address Line 2</label>
                <div class="input-group">
                    <input type="text" name="settings[address_line_2]" class="form-control" value="{{ $settings['address_line_2'] ?? '' }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Regional Settings Section -->
<div class="card mb-4">
    <div class="card-header">
        <h4 class="card-title">Regional Settings</h4>
    </div>
    <div class="card-body">
        @php
            $timezone_identifiers = DateTimeZone::listIdentifiers();
            $timezones = [];
            foreach ($timezone_identifiers as $tz) {
                $timezone = new DateTimeZone($tz);
                $offset = $timezone->getOffset(new DateTime);
                $offsetHours = floor($offset / 3600);
                $offsetMinutes = abs($offset % 3600) / 60;
                $formattedOffset = sprintf("UTC%+03d:%02d", $offsetHours, $offsetMinutes);
                $timezones[$tz] = "($formattedOffset) $tz";
            }
            $selectedTimezone = $settings['timezone'] ?? 'UTC';
        @endphp
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="default_language" class="form-label"><i class="bi bi-translate"></i> Default Language</label>
                <div class="input-group">
                    <select name="settings[default_language]" class="form-control">
                        <option value="en" {{ ($settings['default_language'] ?? '') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="fr" {{ ($settings['default_language'] ?? '') == 'fr' ? 'selected' : '' }}>French</option>
                        <option value="es" {{ ($settings['default_language'] ?? '') == 'es' ? 'selected' : '' }}>Spanish</option>
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="date_format" class="form-label"><i class="bi bi-calendar-date"></i> Date Format</label>
                <div class="input-group">
                    <select name="settings[date_format]" class="form-control">
                        <option value="m/d/Y" {{ ($settings['date_format'] ?? '') == 'm/d/Y' ? 'selected' : '' }}>MM/DD/YYYY</option>
                        <option value="d/m/Y" {{ ($settings['date_format'] ?? '') == 'd/m/Y' ? 'selected' : '' }}>DD/MM/YYYY</option>
                        <option value="Y-m-d" {{ ($settings['date_format'] ?? '') == 'Y-m-d' ? 'selected' : '' }}>YYYY-MM-DD</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="timezone" class="form-label"><i class="bi bi-clock"></i> Time Zone</label>
                <div class="input-group">
                    <select name="settings[timezone]" class="form-control">
                        @foreach ($timezones as $name => $label)
                            <option value="{{ $name }}" {{ $selectedTimezone == $name ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="time_format" class="form-label"><i class="bi bi-hourglass-split"></i> Time Format</label>
                <div class="input-group">
                    <select name="settings[time_format]" class="form-control">
                        <option value="12-hour" {{ ($settings['time_format'] ?? '') == '12-hour' ? 'selected' : '' }}>12-Hour (e.g., 1:00 PM)</option>
                        <option value="24-hour" {{ ($settings['time_format'] ?? '') == '24-hour' ? 'selected' : '' }}>24-Hour (e.g., 13:00)</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="currency" class="form-label"><i class="bi bi-currency-dollar"></i> Currency</label>
                <div class="input-group">
                    <select name="settings[currency]" class="form-control">
                        <option value="USD" {{ ($settings['currency'] ?? '') == 'USD' ? 'selected' : '' }}>USD - US Dollar</option>
                        <option value="EUR" {{ ($settings['currency'] ?? '') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
                        <option value="GBP" {{ ($settings['currency'] ?? '') == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="business_hours" class="form-label"><i class="bi bi-clock-history"></i> Business Hours</label>
                <div class="input-group">
                    <input type="text" name="settings[business_hours]" class="form-control" value="{{ $settings['business_hours'] ?? '9:00 AM to 5:00 PM' }}" />
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-footer text-end">
    <button type="submit" class="btn btn-primary">Save Settings</button>
</div>

{!! Form::close() !!}
</div>
</div>

<!-- jQuery (required for Select2 and logo preview) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('#business_location').select2({
        placeholder: "Select a country",
        allowClear: true
    });
});

function previewLogo(event) {
    const output = document.getElementById('logoPreview');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.style.display = 'block';
}
function previewFavicon(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('faviconPreview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>

@endsection