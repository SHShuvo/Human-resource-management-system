<?php

namespace App\Http\Controllers;

use App\SetHoliday;
use Illuminate\Http\Request;

class SetHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $today=date("Y-m-d");
        return SetHoliday::orderBy('start_date','asc')->where('end_date','>=',$today)->limit(10)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)
    {
        $this->validate($request,[
            'holiday_name' =>'required|max:191',
            'start_date'   =>'required|date',
            'end_date'     =>'required|date',
        ]);
        
        return SetHoliday::create([
            'holiday_name' =>$request['holiday_name'],
            'start_date'   =>$request['start_date'],
            'end_date'     =>$request['end_date'],
            
        ]);
       
         
             
    }

    public function searchHoliday(Request $request){
        $year=$request->year;
        $month=$request->month;
        //$month = date('m', strtotime($today));

        return SetHoliday::orderBy('start_date','asc')->whereMonth('start_date', '=',$month)
        ->whereYear('start_date','=',$year)->get();

        

    }

    
    public function update(Request $request, $id)
    {
        $holiday=SetHoliday::findOrFail($id);
        $this->validate($request,[
            'holiday_name' =>'required|max:191',
            'start_date'   =>'required|date',
            'end_date'     =>'required|date',
        ]);
       
        $holiday->update($request->all());
        return['message'=>'Updated Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SetHoliday  $setHoliday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday=SetHoliday::findOrFail($id);
        $holiday->delete();
        return['message'=>'Deleted Successfully'];
    }
}
