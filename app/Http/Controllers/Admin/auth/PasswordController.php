<?php
 
namespace App\Http\Controllers\AdminAuth; 
 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
 
class PasswordController extends Controller
{
  use ResetsPasswords;
 
  protected $redirectTo = '/admin'; 
  protected $linkRequestView = 'adminAuth.passwords.email'; //パスワードリセット用のビューの場所を指定。
  protected $resetView = 'adminAuth.passwords.reset';
  protected $guard = 'admin'; //ガードの種別指定。
  protected $broker = 'admins'; //config/auth.php内で指定したpasswordの種別を指定。
 
  public function __construct()
  {
  $this->middleware('guest:admin'); //guestミドルウェアのガードにadminを指定
  }
}