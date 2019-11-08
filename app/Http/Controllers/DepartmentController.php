<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::all();
    }

   

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'department' =>'required|max:191',
            'designation'   =>'required',
            
        ]);
        
        return Department::create([
            'department' =>$request['department'],
            'designation'   =>$request['designation'],
        ]);
        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request,$id)
    {
        $department=Department::findOrFail($id);
        $this->validate($request,[
            'department' =>'required|max:191',
            'designation'   =>'required',
            
        ]);
       
        $department->update($request->all());
        return['message'=>'Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=Department::findOrFail($id);
        $department->delete();
        return['message'=>'Deleted Successfully'];
    }
}
