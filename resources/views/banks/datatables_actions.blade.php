{!! Form::open(['route' => ['banks.destroy', $id], 'method' => 'delete','id'=>'formajax']) !!}
<div class='btn-group'>
    {{-- <a href="javascript:void(0);" data-action="{{ route('banks.show', $id) }}" class='btn btn-default btn-sm show-modal' data-size="lg" data-title="View">
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="javascript:void(0);" data-action="{{ route('banks.edit', $id) }}" class='btn btn-default btn-sm show-modal' data-size="lg" data-title="Edit">
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm confirm-modal',
        'onclick' => 'return confirm("Are you sure? You will not be able to revert this!")'

    ]) !!}
</div>
{!! Form::close() !!}
