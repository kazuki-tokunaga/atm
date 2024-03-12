<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;

class AtmController extends Controller
{
    public function createToken()
    {
        return csrf_field();
        //NtdpjzoiGc0dVpegE7cgWm5zguKONjvT1GuxMCa4
    }

    public function accountOpen(Request $request)
    {
        $bankAccount = new BankAccount();
        $bankAccount->fill($request->all())->save();
        return response()->json($bankAccount);
    }

    public function balanceReference($accountId)
    {
        $query = BankAccount::query()->whereId($accountId);
        $bankAccount = $query->get();
        return response()->json($bankAccount);
    }

    public function deposit($accountId, Request $request)
    {
        //BankAccountモデルを利用して口座IDで絞り込み、対象の口座を取得する。
        $bankAccount = BankAccount::find($accountId);

        //残高に対して、リクエストされた金額を加算し更新する。
        $bankAccount->deposit_balance += $request->amount;
        $bankAccount->save();

        //json形式で取得したBankAccountモデルの残高を返却する。
        return response()->json($bankAccount->deposit_balance);
    }

    public function withdrawal($accountId, Request $request)
    {
        //BankAccountモデルを利用して口座IDで絞り込み、対象の口座を取得する。
        $bankAccount = BankAccount::find($accountId);
        
        //リクエストされた金額が残高から引き出せる金額か確認する。
        //残高が足りている場合、残高からリクエストされた金額を減算し更新する。
        if ($bankAccount->deposit_balance >= $request->amount) { 
            $bankAccount->deposit_balance -= $request->amount;
            $bankAccount->save();
        }
        
        //json形式で取得したBankAccountモデルの残高を返却する。
        return response()->json($bankAccount->deposit_balance);
    }
}