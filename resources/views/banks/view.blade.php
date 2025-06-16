<!-- resources/views/banks/view.blade.php -->
@extends('layouts.app')
@section('title', 'Banks Profile')

@section('content')
<div class="row">

    
    <div class="col-xl-12 col-md-9 col-lg-7 order-0 order-md-1">
        <div class="nav-align-top">
          <ul class="nav nav-pills flex-column flex-md-row flex-wrap mb-3 row-gap-2">
            <li class="nav-item"><a class="nav-link @if(Request::is('suppliers/show/*') || Request::route()->getName() === 'banks.show') active @endif" href="@isset($banks->id){{ route('banks.show', $banks->id) }}@else#@endif"><i class="ti ti-user-check ti-sm me-1_5"></i>Information</a></li>
            @isset($banks)
            <li class="nav-item"><a class="nav-link @if(request()->segment(3) == 'ledger') active @endif" href="{{ route('banks.ledger', $banks->id) }}"><i class="ti ti-file ti-sm me-1_5"></i>Ledger</a></li>
            @endisset

            <li class="nav-item">
  <a class="nav-link @if(request()->segment(3) == 'files') active @endif"
     href="{{ route('banks.files', $banks->id) }}">
    <i class="ti ti-file-upload ti-sm me-1_5"></i>Files
  </a>
</li>
          </ul>
        </div>

        <div class="card mb-5" id="cardBody">
          @yield('page_content')
        </div>
    </div>
</div>
@endsection