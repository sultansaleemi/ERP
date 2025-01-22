{!! Form::open(['route' => ['riders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    {{-- <a href="{{ route('riders.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a> --}}
    <a href="javascript:void();" data-action="{{route('rider_contract_upload', $id)}}" data-size="md" data-title="{{$name . ' (' . $rider_id }}') Contract" class="btn btn-warning btn-xs show-modal mr-1"><i class="fas fa-file mx-2"></i> Contract</a>
    <a href="{{ route('riders.edit', $id) }}" class='btn btn-info btn-sm'>
        <i class="fa fa-edit"></i>
    </a>
   {{--  {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'

    ]) !!} {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'

    ]) !!} --}}
</div>
{!! Form::close() !!}
