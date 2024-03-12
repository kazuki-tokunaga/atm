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
        $bankAccount = new bankAccounts();
        $bankAccount->fill($request->all())->save();
        return response()->json($bankAccount);
    }
}