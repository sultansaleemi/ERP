

            {!! Form::open(['route' => 'departments.store','id'=>'formajax']) !!}

        

                <div class="row">
                    @include('departments.fields')
                </div>

          

            <div class="action-btn">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
