{!! Form::open(['route' => 'rta_fines.store', 'id' => 'formajax']) !!}

        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('rta_fines.fields')
                </div>
            </div>

            <div class="action-btn pt-3 px-4 pb-4">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

    {!! Form::close() !!}