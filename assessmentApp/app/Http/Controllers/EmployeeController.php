<?php

namespace App\Http\Controllers;
use App\Models\Staff_employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function index(){

        $records = Staff_employee::with('company')->paginate(1);
        $data['records']=$records;
        return view('employee/list', $data);
    }

    function create(){

        $records=Company::all();
        $data['company']=$records;
        return view('employee/create', $data);
    }

    public function action_post(Request $request)
    {
        $records=Company::all();
        $data['company']=$records;
       
        $validation_array = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required'
        ];
    
        $res = $request->validate($validation_array);
       
     
    
            $input_fields = [
                'first_name' => $request->input('fname'),
                'last_name' => $request->input('lname'),
                'email' => $request->input('email'),
                'phone' =>  $request->input('phone'),
                'company_id' => $request->input('company')
            ];
           
            Staff_employee::create($input_fields);
    
            return redirect()->route('employeeList')->with('success', 'Company created successfully.');
      
    }

    function edit($id){
        $records=Company::all();
        $data['company']=$records;

        $row=Staff_employee::find($id);
        $data['row']=$row;
       
        return view('employee/edit', $data);
    }


    function update(Request $request){
        $records=Company::all();
        $data['company']=$records;

        $validation_array = [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'phone' => 'required'
        ];
        $res=$request->validate($validation_array);
    
        
                    $input_fields = [
                        'first_name' => $request->input('fname'),
                        'last_name' => $request->input('lname'),
                        'email' => $request->input('email'),
                        'phone' =>  $request->input('phone'),
                        'company_id' => $request->input('company')
                    ];
                    $id=$request->input('id');
                    $model=Staff_employee::find($id);
                $model->fill($input_fields);
                $model->save();
                    return redirect()->route('employeeList')
                    ->with('success', 'Update successfully.');
               

    }


}
