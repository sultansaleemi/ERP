{!! Form::open(['route' => ['sims.destroy', $id], 'method' => 'delete','id'=>'formajax']) !!}
<div class='btn-group'>
    {{-- <a href="{{ route('sims.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="javascript:void(0);" data-size="lg" data-title="Update Sim" data-action="{{ route('sims.edit', $id) }}" class='btn btn-default btn-sm show-modal'>
        <i class="fa fa-edit"></i>
    </a>
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => 'return confirm("Are you sure?")'

    ]) !!}
</div>
{!! Form::close() !!}
