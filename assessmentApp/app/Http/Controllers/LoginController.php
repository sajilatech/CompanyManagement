<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    function index(){
        return view('login');
    }

    function authenticate(Request $request){
       
        $validation_array=array(
            'email'=>'required',
            'password'=>'required'
           
        );
        $res=$request->validate($validation_array);
        
        $record = Employee::where('status', 1)
                       ->orWhere(function($query) use ($request) {
                           $query->where('email', $request->email)
                                 ->where('password', md5($request->password)); 
                       })
                       ->first();
                     
                        if ($record) {
                            session([
                                'name' => $record->name,
                                'email' => $record->email,
                                'admin_id' => $record->id,
                            ]);
                           return redirect()->route('dashboard')
        ->with('success', 'Logged successfully.');
                        } else {
                           
                            return redirect()->back()->with('error', 'Invalid User.');
                        }
                        

                   
    }

    function dashboard(){
        return view('welcome');
    }

    function logout(Request $request){
        $request->session()->invalidate();  
        return redirect('/login')->with('message', 'You have been logged out successfully!');
    }
}
