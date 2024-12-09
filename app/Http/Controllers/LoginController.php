<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use Response;
use Redirect;
use Session;
use DB;


class LoginController extends Controller
{
    public function index()
    {
        if(!empty(session('user_id'))){ return redirect()->route('admin-dashboard'); }
        return view('login.login');
    }

    protected function login_postdata(Request $request)
    { 
        if($request->username != ""  && $request->password != "")
        {
            $user = DB::table("quick_account")->where("username" , $request->username)->where('is_Active', '0')->first();
            if($user)
            {
            //  dd($user);
                $password = $request->password;
                if(md5($password) == $user->password)
                {
                    
                    Session::put('user_id', $user->user_id);
                    return redirect()->route('admin-dashboard');
                    Session::flash('message', 'Welcome to Quickway.');
                   
                }
                else
                {
                    return Redirect::back()->withErrors(['msg' => 'Login failed, please check password!!!']);
                }
            }
            else
            {
                return Redirect::back()->withErrors(['msg' => 'Login failed, Username no not find!!!']);
            }
        }
        else
        {
            return Redirect::back()->withErrors(['msg' => 'Please Enter username no and password!!!']);
        }    
    }


    public function logout(Request $request)
    {
    
    Session::flush();
    return redirect()->route('login');

    } 

} 




