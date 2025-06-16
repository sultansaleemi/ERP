@extends('layouts.app')

@section('title', 'Edit Traffic Fine')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit Traffic Fine</h3>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">
    @include('flash::message')
    @include('adminlte-templates::common.errors')

    {!! Form::model($rtaFine, ['route' => ['rta-fines.update', $rtaFine->id], 'method' => 'patch', 'files' => true]) !!}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('rta_fines.fields')
                </div>
            </div>

            <div class="card-footer">
                <a href="{{ route('rta-fines.index') }}" class="btn btn-secondary">Cancel</a>
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}
</div>
@endsection
