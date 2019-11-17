<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{   
    public function index(){
        return Employee::all();
    }

    public function store(Request $request){   
        //return ['message'=>'hi Successfully'];
        $this->validate($request,[
            'firstName'    =>'required|max:191',
            'lastName'     =>'required|max:191',
            'fatherName'   =>'required|max:191',
            'birthDate'    =>'required|date',
            'gender'       =>'required',
            'maritalStatus'=>'required',
            'photo'        =>'required',
            'address'      =>'required|max:500',
            'city'         =>'required|max:191',
            'country'      =>'required|max:191',
            'email'        =>'required|max:191',
            'phone'        =>'required|max:191',
            'employeeId'   =>'required|max:191',
            'department'   =>'required|max:191',
            'designation'  =>'required|max:191',
            'joinDate'     =>'required|date',
        ]);

        $name=null;
        if($request->photo){
            $ext=explode('/',explode(';',$request->photo)[0])[1];
            $name=time().'.'.$ext;
            \Image::make($request->photo)->save(public_path('img/photo/').$name);
        }
        
        return Employee::create([
            
            'firstName'    =>$request['firstName'],
            'lastName'     =>$request['lastName'],
            'fatherName'   =>$request['fatherName'],
            'birthDate'    =>$request['birthDate'],
            'gender'       =>$request['gender'],
            'maritalStatus'=>$request['maritalStatus'],
            'photo'        =>$name,
            'address'      =>$request['address'],
            'city'         =>$request['city'],
            'country'      =>$request['country'],
            'email'        =>$request['email'],
            'phone'        =>$request['phone'],
            'employeeId'   =>$request['employeeId'],
            'department'   =>$request['department'],
            'designation'  =>$request['designation'],
            'joinDate'     =>$request['joinDate'],
            
        ]);
       
         
             
    }
}
