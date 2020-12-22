<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'bank_name' => 'required',
            'account_number'    => 'required',
            'account_name'  => 'required'
        ]);

        $user = User::find($request->user_id);

        if(!$user) return response()->json([
            'status'    => false,
            'message'   => 'User does not exists'
        ], 404);

        $bank = new Bank;
        $bank->user_id = $request->user_id;
        $bank->bank_name = $request->bank_name;
        $bank->account_number = $request->account_number;
        $bank->account_name = $request->account_name;

        $bank->save();

        return response()->json([
            'status'    => true,
            'data'  => $bank
        ]);
    }

    public function getBanks()
    {
        return response()->json([
            'status'    => true,
            'data'  => Bank::all()
        ]);
    }
}
