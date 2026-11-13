<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    use ApiResponses;
public function register(StoreUserRequest $request)//create account
{
     $first_name=$request->first_name;
     $middle_name=$request->middle_name;
     $last_name=$request->last_name;
     $password=$request->password;
     $phone=$request->phone;
//return dd($request->all());
   $user=User::create([
        'first_name'=>$first_name,
        'middle_name'=>$middle_name,
        'last_name'=>$last_name,
        'password'=>bcrypt($password),
        'phone'=>$phone
    ]);
$token =$user->createToken('token for'.$user->first_name)->plainTextToken;
    return $this->success('user registered successfully',['token'=>$token,'token_type'=>'Bearer'],201);
}
    
public function login(LoginUserRequest $request)//login
{
     $password=$request->password;
     $phone=$request->phone;
     $user=User::where('phone',$phone)->first();
     if(!$user||!Hash::check($password,$user->password))
    {
        return $this->fail('InvalidCredentials',[],401);
    }
    $token =$user->createToken('token for'.$user->first_name)->plainTextToken;
    return $this->success('User Loggen in Successfully',[
                    'user'=>$user->only('id','first_name','middle_name','last_name','phone'),
                    'token'=>$token,
                    'token_type'=>'Bearer'],200);
}

public function logout(Request $request)//logout
     {
       $request->user()->currentAccessToken()->delete();
       return $this->success('uesr logged out successfully',[]);
     }
    
}
