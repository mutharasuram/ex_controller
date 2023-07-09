<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
error_reporting("0");
session_start();

class voicecontroller extends Controller
{
    public function dashboard(){
        $userid=$_SESSION["userEmail"];
        $data=DB::connection('mysql2')->select("select DISTINCT `SECTION` from  `studentuser`");
        // print_r($data);
        return view('voice.dashboard')->with('view',$data);
        
        }

        public function view_section(Request $request){
            $section = $request->input('section');
            $data=DB::connection('mysql2')->select("select * from  `studentuser` where `SECTION`= '$section' ");
            
            // print_r($data);       
            return view('voice.view_section')->with('view',$data)->with('section',$section);
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
                 'amount' => '0','fine_details' => 'VOICE','section' =>  $SECTION,'staffid' => $userid,'status' => '','attendance' => '');
                           DB::connection('mysql2')->table('student_fine')->insert($values);
            
                          
               }
            
            }
            return redirect('voicedashboard')->with('alert', 'Approved!');
            }else{
            
            
                return redirect('voicedashboard');
            }
            
            
                }
                public function edit(Request $request){
                    $section = $request->input('section');
                    $userid=$_SESSION["userEmail"];
                    $data=DB::connection('mysql2')->select("select * from  `student_fine` where `fine_details`= 'VOICE' and `staffid`= '$userid' and `section`='$section' and `status`='' ");
                //print_r($data);
                    return view('voice.edit')->with('view',$data);
                    
                    }
                    public function delete(Request $request){
                
                        $id = $request->input('chk');
                        if($id!=""){
                            foreach($id as $ids){
                            
                             $ids;
                          // print_r($ids);
                          DB::connection('mysql2')->table('student_fine')->where('id', $ids)->delete();
                            }
                            return redirect('voicedashboard')->with('alert1', 'Deleted!');
                            }else{
                            
                            
                            return redirect('voicedashboard');
                        
                        }
                    }
                    public function special(Request $request){
                
                         $regno = $request->input('regno');
                       
                         $data=DB::connection('mysql2')->select("select * from  `studentuser` where `REGNO`= '$regno'");
                         $hii=json_encode($data);
                         $value= substr("$hii",1,-1);
                        if($value!==""){
                            return view('voice.special')->with('view',$data);

                        }else{

                            return redirect('voicedashboard')->with('alert1', 'No Data Found!');
                        }



                  
                        }


public function upload(Request $request)
{


$validatedData = $request->validate([
'file' => 'required|file|mimes:pdf|max:2048',
]);


$image = $request->file('file');
$name = $request->input('name');
$regno = $request->input('regno');
$section = $request->input('section');
$Commands = $request->input('Commands');
 //$imageName = $image->getClientOriginalExtension();

//$image->move(public_path('document'), $imageName);
$image1 = base64_encode(file_get_contents($request->file('file')));
 //$pdfData = 'data:application/'.$imageName.';base64,' . $image1;
 //echo '<img class="img-circle" src="'.$pdfData.'" width="40" height="40"/>';
//echo '<iframe src="'.$pdfData.'" style="height:200px;width:300px;">';
 $userid=$_SESSION["userEmail"];
 $username=$_SESSION["userName"];
$date=date('Y-m-d');
$values = array('name' => $name,'regno' => $regno,'section' => $section,'comment' => $Commands,
     'file' => $image1,'staffname' => $username ,'staffid' =>  $userid,'status' => '','date' => $date);

               DB::connection('mysql2')->table('special_permission')->insert($values);
               return redirect('voicedashboard')->with('alert', 'Successfully Approved!');

}                                          
public function view_speal()
{
return view('voice.view_speal');

}

public function view_speal_pdf($id)
{
 $id;
 $data=DB::connection('mysql2')->select("select * from  `special_permission` where `id`= '$id'");
                        

return view('voice.view_speal_pdf')->with('view',$data);

}


public function delete_spel(Request $request){
                
    $id = $request->input('id');

      DB::connection('mysql2')->table('special_permission')->where('id', $id)->delete();
       
        return redirect('view_speal')->with('alert', 'Deleted!');
     
    
   
}


            }
            
