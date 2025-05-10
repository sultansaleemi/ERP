
{!! Form::open(['route' => 'vendors.store', 'id' => 'formajax']) !!}

<div class="card-body">
    <div class="row">
        @include('vendors.fields')
    </div>
</div>

<div class="action-btn pt-3">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
