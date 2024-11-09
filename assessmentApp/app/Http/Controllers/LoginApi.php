<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
class LoginApi extends Controller
{
  
    public function authenticate(Request $request)
    {
       
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',  
                'password' => 'required|string' 
            ]);

          
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()->all()
                ], 422);
            }

           
            $record = Employee::where('status', 1)
                       ->orWhere(function($query) use ($request) {
                           $query->where('email', $request->email)
                                 ->where('password', md5($request->password)); 
                       })
                       ->first();

            if ($record && Hash::check($request->password, $record->password)) {
              
                return response()->json([
                    'success' => true,
                    'message' => 'Logged in successfully.',
                    'data' => [
                        'name' => $record->name,
                        'email' => $record->email,
                        'id' => $record->id,
                     
                    ]
                ], 200);
            }

           
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password.'
            ], 401);

        } catch (\Exception $e) {
           
            return response()->json([
                'status' => false,
                'message' => 'Internal Server Error.',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
