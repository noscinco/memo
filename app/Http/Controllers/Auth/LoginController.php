<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Server;
use Auth;
use Session;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        //validate the form data
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        //attempt tp log the user in
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
             //if successful, then redirect to their intended location
            if(Auth::user()->hasRole('server.unauthorized')){
                Auth::guard('web')->logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect()->guest(route( 'home' ))->with(['message' => 'Você ainda não foi authorizado a acessar sua pagina']);
            }else if(Auth::user()->hasRole('admin')){//administrator
                return redirect()->route('home');
            }else if(Auth::user()->hasRole('server_admin')){//server administrator
                return redirect()->route('index');
            }else if(Auth::user()->hasRole('server')){//server
                return redirect()->route('index');
            }            
        }
        //if unsuccessful, then redirect back to the login form
        return redirect()->back()->withInput($request->only('email','remenber'))->with(['error' => 'Dados inseridos não cadastrados']);
    }

}
