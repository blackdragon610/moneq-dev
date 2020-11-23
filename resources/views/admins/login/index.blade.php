@extends('layouts/admin', ['pageType' => 0])


@section('main')
<div class="login-box">
  <div class="login-logo">
   ログイン
  </div>
  
  
	<?php if (($errors->has('loginID')) || ($errors->has('password')) ){  ?>
  <div class="mt alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i>エラー</h4>
    ログイン情報が間違ってます。
  </div>
	<?php } ?>

  <div class="login-box-body">
    <p class="login-box-msg"></p>

		
		
    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.auth') }}">
	    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	    
      <div class="form-group has-feedback">
        <input type="text" name="login_id" value="{{ old('login_id') }}" class="form-control" placeholder="ログインID">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
             
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" value="" class="form-control" placeholder="パスワード">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      
      <button type="submit" class="btn btn-primary btn-block btn-flat">ログイン</btn btn-primary>
        
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p></p>
    </div>


  </div>
</div>
@endsection