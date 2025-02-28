<li style="list-style:none; cursor: pointer;border-bottom:1px solid #efefef;" class="text-primary py-2">
  <span class="toggle-btn plus-box" style="">-</span> {{ $account->account_code }}-{{ $account->name }} <span class="text-muted "><small>({{ $account->account_type }})</small></span> {!!App\Helpers\Common::status($account->status)!!}
  <span class="text-muted ">{!! $account->notes !!}</span>
  <span style="float:right;">
  {!! Form::open(['route' => ['accounts.destroy', $account->id], 'method' => 'delete','id'=>'formajax']) !!}
 {{--  @if($account->parent_id) --}}
  <a href="javascript:void(0);" data-size="lg" data-title="Edit Account" data-action="{{ route('accounts.edit', $account->id) }}" class='show-modal btn btn-info px-1 py2' >
    <i class="fa fa-edit fa-xs"></i>
</a>
{{-- @endif --}}
<input type="hidden" id="reload_page" value="1"/>
{!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs p-1',
        'onclick' => 'return confirm("Are you sure? You will not be able to revert this!")'

    ]) !!}
    {!! Form::close() !!}
  </span>
  @if ($account->children->count() > 0)
      <ul class="nested" >
          @foreach ($account->children as $child)
              @include('accounts.account-node', ['account' => $child])
          @endforeach
      </ul>
  @endif
</li>
