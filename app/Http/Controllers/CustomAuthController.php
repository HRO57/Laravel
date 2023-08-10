<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
// use Session;



class CustomAuthController extends Controller
{
    public function login (){
        return view ("auth.Login");
    }

    public function registration (){
        return view ("auth.Registration");
    }

    // ----------------Register Page validation ----------------------
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'phone' => 'required|string| unique:users',
            'email'=>'required | email | unique:users',
            'password'=>'required|min:5|max:12',
        ]);

        // ---------------for save data in database-------------
        $user = new User();
        $user -> name =$request -> name;
        $user -> email =$request -> email;
        $user -> phone =$request -> phone;
        $user -> password =Hash::make($request -> password);
        $res = $user -> save();  
        

        // -------message ---------------------------------------
        if($res){
            return back () -> with('success','You have registered successfully');
        }else{
            return back() -> with ('fail','something wrong');
        }   
    }
    // ----------------login Page process & Validation ----------------------
        public function loginUser ( Request $request){
            $request->validate([
                'email'=>'required | email', 
                'password'=>'required|min:5|max:12',
            ]);

            $user = User:: where ('email' ,'=', $request->email) -> first();
            if($user){
                if(Hash::check($request -> password, $user -> password)) {

                    $request -> Session()->put('loginID', $user -> id);
                    return redirect('dashboard');

                }else{
                    return back() -> with ('fail','Password not matches.');
                }

            }else{
                return back() -> with ('fail','This email is registered.');
            }
        }
        // ---------------- End login Page process & Validation ----------------------

        // ---------------- Start dashboard ----------------------

        public function dashboard()
            {
                $data = [];
                if (session()->has('loginID')) {
                    $user = User::where('id', session('loginID'))->first();
                    if ($user) {
                        $data['user'] = $user;
                    }
                }
                return view('auth.dashboard', $data);
            }
        // ---------------- End dashboard ----------------------

        // ---------------- Start logout ----------------------

                public function logout()
                {
                    if (session()->has('loginID')) {
                        session()->pull('loginID');
                        return redirect('login');
                    }
            }
        // ---------------- Start logout ----------------------

}    