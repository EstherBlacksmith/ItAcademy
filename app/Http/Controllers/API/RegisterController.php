<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RegisterController extends BaseController
{   /**
    * Register registerView
    *
    * @return registerView
    */

    public function registerView(){
        return view('auth/register');
    }

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        $this->role();

        $user->assignRole('worker','owner');
        $user->save();

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
    * Register loginView
    *
    * @return loginView
    */
/*
    public function loginView(){        
        return view('auth/login');
    }
*/
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
       
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            //almacenar en la sesion o en local storage
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            
            $_SESSION['succes_token'] =  $success['token'];
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }

    public function roles(){

        /* Spatie
        *
        */
        //create roles
        $owner = Role::create(['name' => 'owner']);
        $worker = Role::create(['name' => 'worker']);


        // create permissions
        $createShop = Permission::create(['name' => 'create shops']);
        $updateShop = Permission::create(['name' => 'update shops']);
        $deleteShop = Permission::create(['name' => 'delete shops']);

        $createCollar = Permission::create(['name' => 'create collars']);
        $updateCollar = Permission::create(['name' => 'update collars']);
        $deleteCollar = Permission::create(['name' => 'delete collars']);

        // assign permissions to the role
        $owner->givePermissionTo([$createShop,$updateShop,$deleteShop,$createCollar,$updateCollar,$deleteCollar]);
        $worker->givePermissionTo([$createCollar,$updateCollar,$deleteCollar]);

    }
}
