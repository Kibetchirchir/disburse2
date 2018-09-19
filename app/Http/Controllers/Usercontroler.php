<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\beneficiary;
use App\paymentDest;
use App\template;
use Excel;
use Auth;
use DB;


class Usercontroler extends Controller
{
    /**
     * Beneficiary one by one
     */
    function createNewBeneficiary(Request $request)
    {
        $this->validate($request, [
            "firstName" => 'required',
            'secondName' => 'required',
            'identity' => 'required',
            'contact' => 'required',
            'amount' => 'required'
        ]);

        /**
         * beneficiary
         */
        $beneficiary = new beneficiary;

        $beneficiary->firstName = $request->input('firstName');
        $beneficiary->secondName = $request->input('secondName');
        $beneficiary->identity = $request->input('identity');
        $beneficiary->contact = $request->input('contact');


        $beneficiary->save();
        /**
         * retreive the beneficiaryID
         */
        $beneficiaryId = $beneficiary->id;;


        /**
         * template
         */
        $temp = new template;

        $temp->save();

        /**
         * retrieve the template ID
         */
        $tempId = $temp->id;

        /**
         * payments
         */

        $pay = new paymentDest;

        $pay->modeId = $request->input('modeId');
        $pay->beneficiaryId = $beneficiaryId;
        $pay->account = $request->input('account');
        $pay->bankName = $request->input('bankName');
        $pay->branchName = $request->input('branchName');
        $pay->amount = $request->input('amount');
        $pay->tempId = $tempId;

        $pay->save();

        /**
         * if everything is OK we return the response
         */

        return response()->json([
            'status' => 'success',
            'message' => 'saved',
        ]);
    }

    /**
     * uploading beneficiaries
     */
    function createNewBeneficiaries(Request $request)
    {
        /**
         * validate
         */

        $this->validate($request, [
            'file' => 'required'
        ]);

        /**
         * upload
         */
        $the_file = Excel::load($request->file('file')->getRealPath(), function ($reader) {
        })->get();

        if($the_file->count()){
            /**
             * template
             */
            $temp = new template;
            $temp->tempName= Session::get('TempName');
            $temp->save();

            /**
             * retrieve the template ID
             */
            $tempId = $temp->id;


            foreach ($the_file as $row) {

                $firstName=$row['firstname'];
                $secondName=$row['secondname'];
                $Id=$row['id'];
                $contact=$row['contact'];
                $modeId=$row['mode_id'];
                $account=$row['account'];
                $bank=$row['bank'];
                $branch=$row['branch'];
                $amount=$row['amount'];


                /**
                 * first save the beneficiary
                 */
                $beneficiary = new beneficiary;

                $beneficiary->firstName = $firstName;
                $beneficiary->secondName = $secondName;
                $beneficiary->identity = $Id;
                $beneficiary->contact = $contact;
                $beneficiary->userId= Auth::user()->userId;
                $beneficiary->clientId=Auth::user()->clientId;


                $beneficiary->save();
                /*
                 * retrieve the id
                 */
                $beneficiaryId = $beneficiary->id;


                /**
                 * payments
                 */

                $pay = new paymentDest;

                $pay->modeId = $modeId;
                $pay->beneficiaryId = $beneficiaryId;
                $pay->account = $account;
                $pay->bankName = $bank;
                $pay->branchName = $branch;
                $pay->amount = $amount;
                $pay->tempId = $tempId;

                $pay->save();

                /**
                 * if everything is OK we return the response
                 */
            }
            /**
             * get the queries for the template
             */
            



            $client=DB::table('beneficiaries')
                ->leftJoin('payment_dests', 'beneficiaries.beneficiaryId', '=', 'payment_dests.paymentDestId')
                ->where('tempId', $tempId)
                ->get();



            return view('disburseConfirm')->with(['client'=> $client,
            'tempId' => $tempId]);
        }

        dd('Request data does not have any files to import.');

    }

    public function disburseStep2(Request $request){
        $this->validate($request,[
            "TempName" => 'required'
        ]);
        $TempName=$request->input('TempName');
        Session::put('TempName' , $TempName);
        return view('disburseUpload2')->with('TempName',$TempName);
    }

}
