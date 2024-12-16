

            {!! Form::model($accounts, ['route' => ['accounts.update', $accounts->id], 'method' => 'patch','id'=>'formajax']) !!}

            <div class="card-body">
                <div class="row">
                    @include('accounts.fields')
                </div>
            </div>

            <div class="action-btn">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
