<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficiary;
use App\paymentDest;
use App\template;
use Excel;
use File;


class Usercontroler extends Controller
{
    /**
     * Beneficiary one by one
     */
    function createNewBeneficiary(Request $request){
        $this->validate($request,[
            "firstName" => 'required',
             'secondName'=> 'required',
             'identity' => 'required',
            'contact' => 'required',
            'amount' => 'required'
        ]);

        /**
         * beneficiary
         */
        $beneficiary= new beneficiary;

        $beneficiary->firstName=$request->input('firstName');
        $beneficiary->secondName=$request->input('secondName');
        $beneficiary->identity=$request->input('identity');
        $beneficiary->contact=$request->input('contact');


        $beneficiary->save();
        /**
         * retreive the beneficiaryID
         */
        $beneficiaryId= $beneficiary->id;;


        /**
         * template
         */
        $temp= new template;

        $temp->save();

        /**
         * retrieve the template ID
         */
        $tempId=$temp->id;

        /**
         * payments
         */

        $pay=new paymentDest;

        $pay->modeId=$request->input('modeId');
        $pay->beneficiaryId=$beneficiaryId;
        $pay->account=$request->input('account');
        $pay->bankName=$request->input('bankName');
        $pay->branchName=$request->input('branchName');
        $pay->amount=$request->input('amount');
        $pay->tempId=$tempId;

        $pay->save();

        /**
         * if everything is OK we return the response
         */

        return response()->json([
            'status'      => 'success',
            'message'     => 'saved',
        ]);
    }

    /**
     * uploading beneficiaries
     */
    function createNewBeneficiaries(Request $request){
        /**
         * uploading
         */

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'name' => $value->name,
                            'email' => $value->email,
                            'phone' => $value->phone,
                        ];
                    }

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    /**
     *
     * test
     */

    public function import(Request $request){
        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'name' => $value->name,
                            'email' => $value->email,
                            'phone' => $value->phone,
                        ];
                    }

                    if(!empty($insert)){

                        $insertData = DB::table('students')->insert($insert);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        }else {
                            Session::flash('error', 'Error inserting the data..');
                            return back();
                        }
                    }
                }

                return back();

            }else {
                Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }
}
