<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "deposit_balance"
    ];
    //$fillable：受け入れるデータを指定する
}