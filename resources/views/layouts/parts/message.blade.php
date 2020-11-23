@if (\Request::input('mode') == 'destroy')
<div class="alert alert-danger alert-dismissible mt" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  削除が完了しました。
</div>
@endif

@if (\Request::input('mode') == 'success')
<div class="alert alert-success alert-dismissible mt" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  登録・変更が完了しました。
</div>
@endif
