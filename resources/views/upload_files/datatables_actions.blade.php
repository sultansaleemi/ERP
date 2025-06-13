{!! Form::open(['route' => ['uploadFiles.destroy', $uploadFile->id], 'method' => 'delete', 'id' => 'formajax']) !!}
<div class='btn-group'>
  <a href="{{ route('uploadFiles.show', $uploadFile->id) }}" class='btn btn-default btn-sm show-modal'>
    <i class="fa fa-eye"></i>
  </a>
  <a href="javascript:void(0);" data-size="lg" data-title="Edit File"
     data-action="{{ route('uploadFiles.edit', $uploadFile->id) }}"
     class='btn btn-info btn-sm show-modal'>
    <i class="fa fa-edit"></i>
  </a>
  {!! Form::button('<i class="fa fa-trash"></i>', [
    'type' => 'submit',
    'class' => 'btn btn-danger btn-sm',
    'onclick' => 'return confirm("Are you sure?")'
  ]) !!}
</div>
{!! Form::close() !!}
