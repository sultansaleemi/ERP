

            {!! Form::open(['route' => 'items.store','id'=>'ajaxform']) !!}

            <div class="card-body">

                <div class="row">
                    @include('items.fields')
                </div>

            </div>

            <div class="action-btn">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}


