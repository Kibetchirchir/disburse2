<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\beneficiary;
use DB;

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


        return 1234;
    }
}
