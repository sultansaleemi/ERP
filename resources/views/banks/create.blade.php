

            {!! Form::open(['route' => 'banks.store','id'=>'formajax']) !!}

            <div class="card-body">

                <div class="row">
                    @include('banks.fields')
                </div>

            </div>

            <div class="action-btn">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
