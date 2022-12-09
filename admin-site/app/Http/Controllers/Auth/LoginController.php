<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'login_id';
    }

    protected function attemptLogin(Request $request)
    {
        try {
            return $this->guard()->attempt(
                $this->credentials($request), $request->boolean('remember')
            );
        } catch (QueryException $e) {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.database')],
            ]);
        }
    }

    protected function validateLogin(Request $request)
    {
        $rulus = [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        $message = [
            $this->username() . '.required' => trans('validation.required_id_or_password'),
            'password.required' => trans('validation.required_id_or_password'),
        ];

        Validator::make($request->all(), $rulus, $message)->validate();
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}
