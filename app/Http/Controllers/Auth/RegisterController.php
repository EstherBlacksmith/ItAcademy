<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
   
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        if ($user->name == 'admin' && $user->email == 'admin@admin.com'){
            $user->assignRole('owner');
        }else{
            $user->assignRole('worker');
        }
        $user->save();        
        return $user;
    }

    public function roles(){
        
        /* Spatie
        *
        */
        // create permissions
        Permission::create(['name' => 'create shops']);
        Permission::create(['name' => 'edit shops']);
        Permission::create(['name' => 'delete shops']);
        Permission::create(['name' => 'update shops']);
    
        Permission::create(['name' => 'create collars']);
        Permission::create(['name' => 'edit collars']);
        Permission::create(['name' => 'delete collars']);
        Permission::create(['name' => 'update collars']);
    
        //create roles
        Role::create(['name' => 'owner']);
        Role::create(['name' => 'worker']);
    }
    
}
