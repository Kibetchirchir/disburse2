<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contactType;
use App\clientType;
use App\documentType;
use App\mode;
use App\userRole;
use App\client;
use App\contacts;
use App\Jobs\SendManagerEmail;

class AdminController extends Controller
{
    public function ContactsType (Request $request){
        /**
         * validate
         */
        $this->validate($request,[
            "contactName" => 'required'
            ]);


        /**
         * save to database
         */

        $contactType=new contactType;

        $contactType->contactName=$request->input('contactName');

        $contactType->save();

        /**
         *response
         */

        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }

    public function ClientType (Request $request){

        /**
         * validation
         */
        $this->validate($request,[
            'clientTypeName' => 'required'
        ]);


        /**
         * save to database
         */
        $clientType= new clientType;

        $clientType->clientTypeName=$request->input('clientTypeName');

        $clientType->save();
        /**
         * response
         */
        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }

    public function DocumentsType(Request $request){
        /**
         * validator
         */
        $this->validate($request,[
            'description' => 'required',
            'documentName' => 'required'
        ]);

        /**
         * save database
         */
        $documentType= new documentType;

        $documentType->description=$request->input('description');
        $documentType->documentName=$request->input('documentName');

        $documentType-> save();
        /**
         * response
         */
        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }
    public function Mode(Request $request){
        /**
         * validator
         */
        $this->validate($request,[
            'madeName' => 'required'
        ]);

        /**
         * save
         */
        $mode= new mode;

        $mode->madeName=$request->input('madeName');

        $mode->save();

        /**
         * response
         */
        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }
    public function userRoles(Request $request){
        /**
         * validator
         */
        $this->validate($request,[
            'roleDescription' => 'required',
            'roleName' => 'required'
        ]);

        /**
         * save
         */

        $userRole= new userRole;

        $userRole->roleDescription=$request->input('roleDescription');
        $userRole->roleName=$request->input('roleName');

        $userRole->save();
        /**
         * response
         */
        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }
    public function RegisterCompany(Request $request){
        /**
         * validate
         */
        $this->validate($request,[
            'firstName' => 'required',
            'email'  => 'required'
        ]);
        /**
         * check if its a company or personal
         */
        if($request->input('secondName') == null){
            $clientTypeId=1;
        }
        else{
            $clientTypeId=3;
        }

        /**
         * generate password
         */
        $password = substr(md5(microtime()),rand(0,26),5);
        /**
         * save the company
         */
        $client =new client;

        $client->firstName=$request->input('firstName');
        $client->secondName=$request->input('secondName');
        $client->nationality=$request->input('nationality');
        $client->password=bcrypt($password);
        $client->clientTypeId=$clientTypeId;
        $client->email=$request->input('email');

        $client->save();
        /**
         * TOdo send emeail with the token
         */

        dispatch(new SendManagerEmail($client));

        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }

    public function Registercontact(Request $request, $password){
        /**
         * validate
         */
//        $this->validate($request,[
//            'contact' => 'required'
//        ]);

        /**
         * check the contact type
         */
        $clientID= 1;

        if($request->input('email')){
            $contact = new contacts;

            $contact->contactTypeId=1;
            $contact->contact=$request->input('email');
            $contact->clientId=$clientID;

            $contact->save();
        }
        if($request->input('phone')){
            $contact = new contacts;

            $contact->contactTypeId=2;
            $contact->contact=$request->input('phone');
            $contact->clientId=$clientID;

            $contact->save();
        }


        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);

    }
}
