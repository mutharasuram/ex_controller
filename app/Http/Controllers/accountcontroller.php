<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
error_reporting("0");
session_start();
class accountcontroller extends Controller
{
    public function dashboard(){
        $userid=$_SESSION["userEmail"];
        $data=DB::connection('mysql2')->select("select DISTINCT `SECTION` from  `studentuser`");
        // print_r($data);
        return view('account.dashboard')->with('view',$data);
        
        }
        public function view_section(Request $request){
        $section = $request->input('section');
        $data=DB::connection('mysql2')->select("select * from  `studentuser` where `SECTION`= '$section' ");
        
        // print_r($data);       
        return view('account.view_section')->with('view',$data)->with('section',$section);
        }

        public function insert_no(Request $request){
            $userid=$_SESSION["userEmail"];
            $id = $request->input('chk');
        //print_r($id);
        if($id!=""){
        foreach($id as $ids){
        
         $ids;
        $data=DB::connection('mysql2')->select("select * from  `studentuser` where `id`= '$ids' ");
        // print_r($data);
        foreach($data as $views){
         $FULLNAME=$views->FULLNAME;
         $REGNO=$views->REGNO;
         $BATCH=$views->BATCH;
         $YOS=$views->YOS;
         $SECTION=$views->SECTION;
         $values = array('name' => $FULLNAME,'regno' => $REGNO,'batch' => $BATCH,'yos' => $YOS,
         'amount' => '0','fine_details' => 'ACCOUNT','section' =>  $SECTION,'staffid' => $userid,'attendance' => '','status' => '');
                   DB::connection('mysql2')->table('student_fine')->insert($values);
        
        }
        
        }
        return redirect('accountdashboard')->with('alert', 'Added!');
        }else{
        
        
        return redirect('accountdashboard');
        }
        
        
        }
        public function edit(Request $request){
            $section = $request->input('section');
            $userid=$_SESSION["userEmail"];
            $data=DB::connection('mysql2')->select("select * from  `student_fine` where `fine_details`= 'ACCOUNT' and `staffid`= '$userid' and `section`='$section' and `status`='' ");
        //print_r($data);
            return view('account.edit')->with('view',$data);
            
            }
        
            public function delete(Request $request){
        
                $id = $request->input('chk');
                if($id!=""){
                    foreach($id as $ids){
                    
                     $ids;
                  // print_r($ids);
                  DB::connection('mysql2')->table('student_fine')->where('id', $ids)->delete();
                    }
                    return redirect('accountdashboard')->with('alert1', 'Deleted!');
                    }else{
                    
                    
                    return redirect('accountdashboard');
                
                }
            }
}
