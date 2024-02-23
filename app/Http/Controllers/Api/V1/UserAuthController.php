<?php

namespace App\Http\Controllers\Api\v1\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use App\Models\Seller\Seller;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use Laravel\Passport\DNSCheckValidation;
use Laravel\Passport\RFCValidation;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\User\UserAdress;



class UserAuthController extends Controller
{
    public function user_login(Request $request)
    {
    
            
            $email = $request->email;
            $password = $request->password;

            
            if(Auth::attempt(['email' => $email, 'password'=> $password]))
            {
              $user = Auth::User();
              $token = $user->createToken('Token')->accessToken;
              $user->email;
             
              return response()->json([
               
               'accessToken' =>  $token->token,
               'status' => 'ok',
           
               "message" => 'Logged in',
              ],200);
    
            }
            return response()->json([
                "status" => "error",
                 "message" => "Missing username and/or password"
            ],404);
        }      







    
    public function user_register(Request $request){
        { 
            $validator = Validator::make($request->all(), [ 
                'email'  => 'required|email',
                'UserCity' => 'required',
                'UserCounty' => 'required',
                'UserRegion' => 'required',
                'password' => 'required',
                'c_password' => 'required|same:password',
            
                
                
            ]);
            
            if ($validator->fails()) { 
                 return response()->json(['Hata'=>$validator->errors()], 401);            
     }
      
       
                 
            $seller = new User;
            $seller->password = bcrypt($request->password);
            $seller->email = $request->email;
            $seller->save();

            $useradress = new UserAdress;
            $useradress->UserCity = $request->UserCity;
            $useradress->UserCounty = $request->UserCounty;
            $useradress->UserRegion = $request->UserRegion;
            $useradress->save();


            
            
            
       
          
          
           
     return response()->json([
        
        
     $seller,

    
    ]); 
        }
        return response()->json([
            "status" => "error",
             "message" => "Missing username and/or password"
        ],404);


    }
 


   
}
