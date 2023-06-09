<?php
namespace App\Http\Controllers;
use App\Models\BankAccount;
use Illuminate\Http\Request;


class SpaController extends Controller
{
    public function index(){
        return view("atm");
    }
    
    public function accountOpen(){
        $account = new BankAccount();
        $account->deposit_balance = 0;
        $account->save();

        return response()->json([
            "id" => $account->id,
            "deposit_balance" => $account->deposit_balance
        ]);
    }

    public function createToken()
    {
        return csrf_field();
    }

    public function balanceReference($accountId){
        $bankaccount = BankAccount::find($accountId);
        return response()->json([
            "deposit_balance" => $bankaccount->deposit_balance
        ]);
    }   

    public function deposit($accountId, Request $request){
        $bankaccount = BankAccount::find($accountId);
        $bankaccount->deposit_balance += $request->amount;
        $bankaccount->save();
        return response()->json([
            "deposit_balance" => $bankaccount->deposit_balance
        ]);
    }

    public function withdrawal($accountId, Request $request){
        $bankaccount = BankAccount::find($accountId);
        if($bankaccount->deposit_balance >= $request->amount){
            $bankaccount->deposit_balance -= $request->amount;
            $bankaccount->save();
        }
        return response()->json([
            "deposit_balance" => $bankaccount->deposit_balance
        ]);
    }
}