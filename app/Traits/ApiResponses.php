<?php 
namespace App\Traits;

trait ApiResponses{
protected function success($message,$data=[],$statusCode=200){//برجع استجابة ناجحة مع رسالة وبيانات مخصصين
    //returns a successful response with custom message and data
  return response()->json([
    'message'=>$message,
    'data'=>$data,
    'status'=>$statusCode],$statusCode);
   }

protected function fail($message,$data=[],$statusCode){//برجع استجابة فاشلة مع رسالةوبيانات مخصصين 
    //returns a failure response with custom message and data
  return response()->json([
    'message'=>$message,
    'data'=>$data,
    'status'=>$statusCode],$statusCode);
}








}