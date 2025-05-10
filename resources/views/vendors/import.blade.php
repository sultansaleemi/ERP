{!! Form::open(['route' => 'vendors.import', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'formajax']) !!}

<div class="card-body">
    <div class="form-group">
        <label for="file">Upload Vendor File:</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>
</div>

<div class="action-btn pt-3">
    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
    {!! Form::submit('Import', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}