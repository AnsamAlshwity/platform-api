<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request,User $user)
    {
        $firstName=$request->first_name??$user->first_name;
        $middelName=$request->middel_name??$user->middel_name;
        $lastName=$request->last_name??$user->last_name;
        $phone=$request->phone??$user->phone;
        $subscriptionNumber=$request->subscription_number??$user->subscription_number;
        $user->update([$firstName,$middelName,$lastName,$subscriptionNumber,$phone
       /* 'first_name'=>$first_name,
        'middle_name'=>$middle_name,
        'last_name'=>$last_name,
       'subscription_number'=>$subscription_number,
        'phone'=>$phone*/
        ]);
    }
}
