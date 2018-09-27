<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficiary;
use App\transaction;
use DB;
use Auth;
use App\batch;
use Redirect;
class Disburse extends Controller
{
    /**
     * disbursing
     */

    public function disburse(Request $request, $tempId){
        $client=DB::table('beneficiaries')
            ->leftJoin('payment_dests', 'beneficiaries.beneficiaryId', '=', 'payment_dests.paymentDestId')
            ->where('tempId', $tempId)
            ->get();

//        return $client;
        /**
         * create the batch
         */

        /*
         * this is  the data we create for batch
         */

        $amount=DB::table('beneficiaries')
            ->leftJoin('payment_dests', 'beneficiaries.beneficiaryId', '=', 'payment_dests.paymentDestId')
            ->where('tempId', $tempId)
            ->sum('amount');
        $batchNo=strtoupper(str_random(5)) . date('jn');

//        return $amount;
          $batch = new batch;
          $batch->batch_no=$batchNo;
          $batch->full_amount=$amount;
          $batch->uploaded_by=Auth::user()->userId;
          $batch->aproved_by=Auth::user()->userId;
          $batch->client_id=Auth::user()->clientId;

          $batch->save();


        foreach ($client as $client){

            $name = $client->firstName .'&nbsp'. $client->secondName;
            $reference= strtoupper(str_random(5)) . date('jn');
            $narration=$client->narration;
            $account=$client->account;
            $bankName=$client->bankName;
            $branchName=$client->branchName;
            $mode=$client->modeId;
            $clientId=Auth::user()->clientId;
            $userId=Auth::user()->userId;

            $transaction= new transaction;
            $transaction->transRefNo=$reference;
            $transaction->narration=$narration;
            $transaction->modeId=$mode;
            $transaction->clientId=$clientId;
            $transaction->userId=$userId;
            $transaction->name=$name;
            $transaction->account=$account;
            $transaction->bankName=$bankName;
            $transaction->branchName=$branchName;
            $transaction->batch_no=$batchNo;

            $transaction->save();

        }

        $data=[
            "batch" => $batchNo,
            "amount" => $amount
        ];

        //return view('confirmed')->with(['batch'=> $batchNo,'amount' => $amount]);

        return redirect('/success')->with(['batch'=> $batchNo,'amount' => $amount]);

        //return view('confirmed', ['batch'=> $batchNo,'amount' => $amount]);
    }
}
