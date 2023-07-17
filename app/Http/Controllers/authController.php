<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class authController extends Controller
{
    public function login()
    {
        return view('admin.pages.auth.login');
    }
    public function userLogin(Request $req)
    {
        $email = $req->email;
        $pass = md5($req->password);
        $user = User::where('email','=',$email)
                    ->where('password','=',$pass)
                    ->first();
        if($user){
            //check if user is approved (cheack value of status colum is 1)
            if($user->status == 1)
            {
                Session::put('user_fname', $user->first_name);
                Session::put('user_lname', $user->last_name);
                Session::put('email', $user->email);
                Session::put('role', $user->role);
                return redirect('admin/dashboard');

            }else{
                return redirect()->back()->with('error', 'User is Not approved Yet');
            }
            //save user info into the season
            
        }else{
            return redirect()->back()->with('error', 'User Not Found with these credentials');
        }
        
    }
    public function teacherRegister()
    {
        return view('admin.pages.auth.teacher_register');
    }
    public function registrationTeacher(Request $req)
    {
        if($req->password == $req->conf_password)
        {
            $user_exists= User::where('email','=',$req->email)->first();
            if($user_exists){
                return redirect()->back()->with('error','Email Already Exists');    
            }
            else{
                $user= new User();
                $user->first_name = $req->first_name;
                $user->last_name = $req->last_name;
                $user->email = $req->email;
                $user->password = md5($req->password);
                $user->role = 'Teacher';
                if($user->save()){
                    return redirect()->back()->with('success','User Registered, Waiting for Admin Approval.');
                }

            }
        }else{
            return redirect()->back()->with('error','Password Mismatch');
        }
        

        
    }
    public function studentRegister()
    {
        return view('admin.pages.auth.student_register');
    }
    public function registrationStudent(Request $r)
    {
        if($r->password ==$r->conf_password)
        {
            $user_exists= User::where('email','=',$r->email)->first();
            if($user_exists){
                return redirect()->back()->with('error','Email Already Exists');    
            }
            else{
                $user= new User();
                $user->first_name = $r->first_name;
                $user->last_name = $r->last_name;
                $user->email = $r->email;
                $user->student_id = $r->roll;
                $user->password = md5($r->password);
                $user->role = 'Student';
                if($user->save()){
                    return redirect()->back()->with('success','User Registered, Waiting for Admin Approval.');
                }

            }
        }else{
            return redirect()->back()->with('error','Password Mismatch');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget(['user_fname', 'user_lname', 'email', 'role']);
        return redirect('admin/login');
    }
    
}
