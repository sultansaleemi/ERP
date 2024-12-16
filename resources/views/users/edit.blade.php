

        @include('adminlte-templates::common.errors')



            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch','id'=>'formajax']) !!}

                <div class="row">
                    @include('users.fields')
                </div>
<br>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

   