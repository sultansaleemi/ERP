@extends('riders.view')

@section('page_content')

            {!! Form::open(['route' => 'riders.store','id'=>'formajax']) !!}

            <div class="card-body">

                <div class="row">
                    @include('riders.fields')
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn  btn-primary">Save Information</button>
                <a href="{{ route('riders.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
