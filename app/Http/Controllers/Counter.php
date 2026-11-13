<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCounterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Counter extends Controller
{
    public function RegisterNewCounter(RegisterCounterRequest $request)//تسجيل عداد لمستخدم معين
{
          $privateNumber=$request->privatelNumber;
      $counterType=$request->counterType;

$counter=Auth::user()->counters()->creat([

 'private_number'=>$privateNumber,
 'counter_type'=>$counterType
]);
    }
}
