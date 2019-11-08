<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SetWorkingDays;

class SetWorkingDaysController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:admin');
    }
    
    public function index()
    {
        //return ['message'=>'need to update'];
        return SetWorkingDays::latest()->orderBy('id', 'desc')->first();
    }
    
    public function updateInfo(Request $request)
    {
        $counts=SetWorkingDays::count();
        if($counts==null){
            return SetWorkingDays::create([
                'saturday' =>$request['saturday'],
                'sunday'   =>$request['sunday'],
                'monday'   =>$request['monday'],
                'tuesday'  =>$request['tuesday'],
                'wednesday'=>$request['wednesday'],
                'thursday' =>$request['thursday'],
                'friday'   =>$request['friday']
            ]);
           
        }
        else{
            $post=SetWorkingDays::latest()->orderBy('id', 'desc')->first();
            
            $days = ['saturday','sunday','monday','tuesday','wednesday','thursday','friday' ];
            foreach($days as $day) {
                if (!$request->{$day}){
                  $request->merge([$day => null]);
                }
            }
            
            $post->update($request->all());
            return ['message'=>'Updated Successfully'];
        }    

    }   
}
