<li style="list-style: none; cursor: pointer:padding:10px;" class="text-primary my-1">
  <span class="toggle-btn" style="cursor: pointer;border:1px solid #efefef;padding:2px 5px;">+</span> {{ $account->name }}
  @if ($account->children->count() > 0)
      <ul class="nested d-none" >
          @foreach ($account->children as $child)
              @include('accounts.account-node', ['account' => $child])
          @endforeach
      </ul>
  @endif
</li>
