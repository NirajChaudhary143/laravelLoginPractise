<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Hash;
// use Session;
// use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Session;

class UserLoginController extends Controller
{
    public function register(){
        return view('registration');
    }
    public function userRegister(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email' => 'required|email|unique:students',
                'password'=>'required'
            ]
            );
            $student = new Student;
            $student->name=$request['name'];
            $student->email=$request['email'];
            $student->password=Hash::make($request['password']);
            $reg= $student->save();
            if($reg){
                return redirect('/')->with('success','Registered successfully');
            }
            else{
                return redirect('/')->with('fail','Unsuccessfull Registration');
            }

            
    }
    public function loginForm(){
        return view('login');
    }
    public function loggedIn(Request $request){
        $request->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
            );

            $student = Student::where('email','=',$request['email'])->first();
            if($student){
                // $pw=$request['password'];
                if(Hash::check($request['password'],$student->password)){
                    $request->session()->put('loginId',$student->student_id);
                    return redirect('dashboard');
                }
                else{
                    return back()->with('fail','Email and password doest not match');

                }
            }
            else{
                return back()->with('fail','Email is not registered');
            }

    }
    public function dashboard(){
        // $data = array();
        if(Session::has('loginId')){
            $data = Student::where('student_id','=',Session::get('loginId'))->first();
        }
        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
