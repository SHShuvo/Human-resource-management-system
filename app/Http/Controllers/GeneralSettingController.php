<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeneralSetting;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:admin');
    }
    
    public function index()
    {
        //return ['message'=>'need to update'];
        return GeneralSetting::latest()->orderBy('id', 'desc')->first();
    }
    
    public function updateInfo(Request $request)
    {
        $this->validate($request,[
            'name'   =>'required|max:191',
            'email'  =>'required|email|max:191 |unique:users',
            'address'=>'required|max:500',
            'city'   =>'required|max:191',
            'country'=>'required|max:191',
            'phone'  =>'required|max:191',
            'website'=>'required|max:191',
             ]);
             
        $counts=GeneralSetting::count();
        if($counts==null){
            
            $name=null;
            if($request->logo){
                $ext=explode('/',explode(';',$request->logo)[0])[1];
                $name=time().'.'.$ext;
                \Image::make($request->logo)->save(public_path('img/logo/').$name);
            }

            return GeneralSetting::create([

                'name'   =>$request['name'], 
                'email'  =>$request['email'],
                'address'=>$request['address'], 
                'city'   =>$request['city'], 
                'country'=>$request['country'], 
                'phone'  =>$request['phone'], 
                'website'=>$request['website'],
                'logo'    =>$name,
            ]);
        }
        else{
            $post=GeneralSetting::latest()->orderBy('id', 'desc')->first();
            if($request->logo!=$post->logo){
                $ext=explode('/',explode(';',$request->logo)[0])[1];
                $name=time().'.'.$ext;
                \Image::make($request->logo)->save(public_path('img/logo/').$name);
                
                $request->merge(['logo'=> $name]);
                $postPhoto=public_path('img/logo/').$post->logo;
                if(file_exists($postPhoto)){
                    @unlink($postPhoto);
                }
        
            }
            $post->update($request->all());
            return ['message'=>'Updated Successfully'];

        }     
            

            
    }
}
