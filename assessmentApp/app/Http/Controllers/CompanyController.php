<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    
    function index(){

        $records=Company::all();
        $data['records']=$records;
        return view('company/list', $data);
    }

    function create(){

        
        return view('company/create');
    }

    public function action_post(Request $request)
    {
       
        $validation_array = [
            'name' => 'required',
            'email' => 'required|email',
            
            'website' => 'required|url',
             'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ];
    
        $res = $request->validate($validation_array);
       
        if ($request->file('file')->isValid()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $path = $request->file->move(public_path('uploads/logo'), $fileName);
    
            $input_fields = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'logo' => $fileName,
                'website' => $request->input('website'),
            ];
           
           Company::create($input_fields);
    
            return redirect()->route('companyList')->with('success', 'Company created successfully.');
        }
    
        return back()->with('error', 'Failed to upload file.');
    }

    function edit_comp($id){
        $row=Company::find($id);
        $data['row']=$row;
       
        return view('company/edit', $data);
    }


    function action_update(Request $request){
        $validation_array = [
            'name' => 'required',
            'email' => 'required|email',
            
            'website' => 'required|url',
             'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ];
        $res=$request->validate($validation_array);
        if ($request->file('file')->isValid()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $path = $request->file->move(public_path('uploads/logo'), $fileName);
                    $input_fields = [
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'logo' => $fileName,
                        'website' => $request->input('website'),
                    ];
                    $id=$request->input('id');
                    $model=Company::find($id);
                $model->fill($input_fields);
                $model->save();
                    return redirect()->route('employeeList')
                    ->with('success', 'Update successfully.');
                }
                else{
                    return back()->with('error', 'Failed to upload file.');
                }

    }

    function distroy(){
        $row=Company::find($id);
        $row->delete();
        return redirect()->route('companyList')->with('success', 'Company created successfully.');

    }
   
}
