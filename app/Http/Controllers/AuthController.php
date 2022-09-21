<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;
use Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');


    }

    //handle register user ajax request
    
    public function registerUser(Request $request)
    {
        $validator= validator::make($request->all(),[
            'first_name'=>'required|max:10',
            'last_name'=>'required|max:10',
            'email'=>'required|email|unique:users|max:50',
            'password'=>'required|min:8|max:20',

        ]
    );
    if($validator->fails()){
        return response()->json([
            'status' => 400,
            'messages' => $validator->getMessageBag()
        ]);
    }else{
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        return response()->json([
            'status'=> 200,
            'messages' =>'registered Succefully !'
        ]);
        
    }
    }
    //handle login user ajax request
    public function loginUser(Request $request)
    {
        $validator= validator::make($request->all(),[
           
            'email'=>'required|email|max:50',
            'password'=>'required|min:8|max:20',

        ]
    );
    if($validator->fails()){
        return response()->json([
            'status' => 400,
            'messages' => $validator->getMessageBag()
        ]);
    }else{
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('loggedInUser',$user->id);
                return response()->json([
                    'status' => 200,
                    'messages' => 'success'
                ]);
            }else{
                return response()->json([
                    'status' => '401',
                    'messages' => 'E-mail or password is incorrect !'
                ]);
            }
        }else{
            return response()->json([

                'status' => 401,
                'messages' => 'User not found !'
            ]);
        }
    }
    }

    

    public function forgotPassword(){
        return view('auth.forgot');
    }

    public function resetPassword(){
        return view('auth.reset');
    }
    public function dashboard(){
        return view('dashboard');
    }
    public function signOut() {
        Auth::logout();

        return Redirect('login');
    }

    

    

}