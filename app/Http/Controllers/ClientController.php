<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientController extends Controller
{
    public function createUser(Request $request){
        /**
         * validate
         */
        $this->validate($request,[
            'name' => 'required',
            'roleId' => 'required',
            'email' => 'required'
        ]);

        /**
         * create the password
         */
        $password = substr(md5(microtime()),rand(0,26),5);
        /**
         * new user
         */
        $user= new User;

        $user->userNationalId=$request->input('userNationalId');
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->phone=$request->input('phone');
        $user->password=bcrypt('$password');
        $user->roleId=$request->input('roleId');
        $user->clientId=1;
        $user->email_token=base64_encode($password);

        $user-> save();

        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }
    /**
     * creating benefici
     */
}
