<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;

use App\Traits\AdminAuth\AuthenticatesAdmins;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesAdmins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = null;


    public function __construct()
    {
        $this->redirectTo=route('admin.home');
        $this->middleware('admin.guest')->except('logout');
    }
}
