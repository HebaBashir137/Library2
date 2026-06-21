<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    //
    public function adminlogin(){
        return view('Auth.admin');
    }
    


    public function adminCheckLogin(Request $request){
        $credentials=$request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $admin=Admin::where('email', $credentials['email'])->first();
        if($admin && Hash::check($credentials['password'],$admin->password)){
            Auth::guard('admin')->login($admin);
                    
            return redirect()->route('dashboard.index')->with('success','welcome');

        }
        return redirect()->back()->with('error','invalid email or password');

    }

    public function Logout(Request $request){
        $guards=['admin','web'];
        foreach($guards as $guard ){
            if (Auth::guard($guard)->check())
            {
                Auth::guard($guard)->logout();
            }
           
        }
         $request->session()->invalidate();
              $request->session()-> regenerate();
              return redirect('/');
    }



        public function userregister(){
        return view('Auth.register');


    }

    public function userCheckRegister(Request $request)
    {
        $input=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

       $input['password']=bcrypt($input['password']);
       User::create($input);
        

        return redirect()->route('user.login')->with('success','you log now');
    }


    
    public function userlogin(){
        return view('Auth.user');
    }

    public function userCheckLogin(Request $request){
        $credentials=$request->validate([
            'email'=>['required','email'],
            'password'=>['required']
        ]);
        $user=User::where('email', $credentials['email'])->first();
        if($user && Hash::check($credentials['password'],$user->password)){
            Auth::guard('web')->login($user);
            return redirect()->route('user.book.index')->with('success','welcome');

        }
        return redirect()->back()->with('error','invalid email or password');

    }

    
}
