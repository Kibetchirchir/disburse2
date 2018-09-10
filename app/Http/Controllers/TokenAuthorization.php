<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;

class TokenAuthorization extends Controller
{
    /**
     * token authorization
     */

    public function VerifyToken($token){
        $user = client::where('password',$token)->first();
        if($user== null){
            return redirect('/login')->with('status','email token wrong');
        }else
        {
            $user->clientStatus = 1;
            if($user->save()){
                return redirect('/register')->with(['status' => 'email verified now create your account',
                    'token' => $token,
                    'id' => $user->clientId
                    ]);
            }
        }

    }
}
