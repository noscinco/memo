<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Models\Role;
use App\Sector;
use App\Office;
use App\Server;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    public function showRegistrationForm(){
        $sectors = Sector::orderBy('name','asc')->get();
        $offices = Office::orderBy('name','asc')->get();
        return view('auth.register',compact('sectors','offices'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'regex:/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', 'max:100'],
            'email' => ['required', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6','max:20','confirmed'],
            'cpf'=>['required','cpf','unique:servers'],
            'siape_code'=>['required','unique:servers','max:20'],
            'sector_code'=>['required'],
            'office_code'=>['required'],
           

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    
    protected function create(array $data)
    {
        $sector = Sector::find($data['sector_code']);
        $office = Office::find($data['office_code']);

        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $server = new Server();
        $server->name = $data['name'];
        $server->cpf = $data['cpf'];
        $server->siape_code=$data['siape_code'];
        $server->user_id=$user->id;
        $server->office()->associate($office);
        $server->sector()->associate($sector);
        $server->initials_code = $this->initials(trim($data['name']));
        $server->number_memo =0;

        $role = Role::where('name', '=', 'Server_Unauthorized')->first();
        $server->save();

        $user->attachRole($role);
        $user->save();
        return $server;

    }
    
    public function register(Request $request){
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('login')
            ->with(['message' => 'Sua solicitação de login foi registrada, aguarde a aceitação']);
    }

    private function initials($name){
        $words = explode(" ",$name);
        $initials="";
        foreach($words as $letter){
            $initials .=$letter[0];
        }
        $initials = strtoupper($initials);
        $flag=1;
        while(Server::where('initials_code','=',$initials)->get()->count()>0){
            $flag+=1;
        }
        if($flag>1)
            $initials.=$flag;
            
        $initials = strtoupper($initials);
        return trim($initials);
    }
    
}
