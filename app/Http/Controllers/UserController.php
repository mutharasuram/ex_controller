<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
error_reporting("0");
session_start();
class UserController extends Controller
{
    
    public function staff_auth(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');
        $data=DB::select("SELECT * FROM `users` WHERE `userEmail`='$username' AND `userPass`='$password'");

        

    
        $hii=json_encode($data);
        $value= substr("$hii",1,-1);
       if($value!==""){
       $tokenOutput2 = json_decode($value);
       $username=$tokenOutput2->{'userName'}; 
      $userid=$tokenOutput2->{'userEmail'}; 
      $_SESSION["userName"] = $username;
      $_SESSION["userEmail"] = $userid;

      $role=DB::select("SELECT * FROM `stafflist` WHERE `staffid`='$userid' and (`designation` LIKE '%hod%' or
      `designation` LIKE '%accoun%' or `designation` LIKE '%princi%' or`designation` LIKE '%dean%' or`designation` LIKE '%exam%')");

      $hii1=json_encode($role);
        $value1= substr("$hii1",1,-1);
      
      if($value1!==""){
        $tokenOutput21 = json_decode($value1);
        $designation=$tokenOutput21->{'designation'}; 

        if(stripos($designation, 'hod') !== FALSE){

            return redirect()->route('hod_dash');
        }
        if(stripos($designation, 'accoun') !== FALSE){

            return redirect()->route('acc_dash');
        }
        if(stripos($designation, 'princi') !== FALSE){

            return redirect()->route('voice_dash');
        }
        if(stripos($designation, 'dean') !== FALSE){

            return redirect()->route('dean_dash');
        }
        if(stripos($designation, 'exam') !== FALSE){

            
     return redirect('dashboard');
        }


      }
    else{

        ?><script>
        alert('You Not Have Rights');
        window.location.href='/';
        </script>
        
        <?php

    }







       }else{
        ?><script>
        alert('Wrong username or Password');
        window.location.href='/';
        </script>
        
        <?php
       
       }
     
    }
   
public function dashboard(){
$userid=$_SESSION["userEmail"];
$data=DB::connection('mysql2')->select("select DISTINCT `SECTION` from  `studentuser`");
// print_r($data);
return view('dashboard')->with('view',$data);

}
public function view_section(Request $request){
$section = $request->input('section');
$data=DB::connection('mysql2')->select("select * from  `studentuser` where `SECTION`= '$section' ");

// print_r($data);       
return view('view_section')->with('view',$data)->with('section',$section);
}
public function fine(Request $request){
 $fine = $request->input('fine');
 $name = $request->input('name');
 $REGNO = $request->input('REGNO');
 $BATCH = $request->input('BATCH');
 $YOS = $request->input('YOS');
  $section = $request->input('section');
  $userid=$_SESSION["userEmail"];
 foreach($fine as $fines => $index){

 $ff=$fine[$fines];

if($ff!=""){
    $fineee=$fine[$fines];
    $name1= $name[$fines];
    $REGNO1= $REGNO[$fines];
    $BATCH1= $BATCH[$fines];
    $YOS1= $YOS[$fines];


     $values = array('name' => $name1,'regno' => $REGNO1,'batch' => $BATCH1,'yos' => $YOS1,
     'amount' => $fineee,'fine_details' => 'DEEN OF STUDENT','section' =>  $section,'staffid' => $userid,'status' => '');
               DB::connection('mysql2')->table('student_fine')->insert($values);


}

 }
 return redirect('dashboard')->with('alert', 'Added!');
}


public function pay(){
    
    $data=DB::connection('mysql2')->select("select DISTINCT `SECTION` from  `studentuser`");
    // print_r($data);
    return view('pay')->with('view',$data);
    
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
   //  $values = array('name' => $FULLNAME,'regno' => $REGNO,'batch' => $BATCH,'yos' => $YOS,
   //  'amount' => '0','fine_details' => 'VOICE','section' =>  $SECTION,'staffid' => $userid,'status' => '');
            //   DB::connection('mysql2')->table('student_fine')->insert($values);
 DB::connection('mysql2')->table('student_fine')->where(['regno'=>$REGNO,'section'=>$SECTION])->update(array('status' => 'Done'));

   }

}
return redirect('dashboard')->with('alert', 'Hall Ticket Successfully Generated!');
}else{


    return redirect('dashboard');
}


    }
    public function edit(Request $request){
        $section = $request->input('section');
        $data=DB::connection('mysql2')->select("select DISTINCT `regno` from  `student_fine` where `section`= '$section' and `status`!='' and `fine_details`='VOICE' ");


    //print_r($data);
        return view('edit')->with('view',$data)->with('section',$section);
        
        }
        public function delete(Request $request){
    
            $id = $request->input('chk'); 
            if($id!=""){
                foreach($id as $ids){
                
                 $ids;
              // print_r($ids);
              DB::connection('mysql2')->table('student_fine')->where('id', $ids)->delete();
                }
                return redirect('dashboard')->with('alert1', 'Deleted!');
                }else{
                
                
                return redirect('dashboard');
            
            }
        }
        public function pdf(Request $request){
            $regno = $request->input('reg');
            $pdf = Pdf::loadView('pdf.hallticket',[
                'regno'=> $regno
            ]);
            return $pdf->download("$regno.pdf");
            
            }     
            public function excel(Request $request){
                $section = $request->input('section');
                $data=DB::connection('mysql2')->select("select DISTINCT `regno` from  `student_fine` where `section`= '$section' and `status`!='' and `fine_details`='VOICE' ");


    //print_r($data);
        return view('excel')->with('view',$data)->with('section',$section);
        
                }  

public function staff_alert(){

$data=DB::connection('mysql2')->select("select DISTINCT `SECTION` from  `studentuser`");
$data1=DB::select("select * from  `stafflist`");
// print_r($data);
return view('staff_alert')->with('view',$data)->with('view1',$data1);



}  

          public function ins_staff_alert(Request $request){
            $date = $request->input('date');
            $hall = $request->input('hall');
            $exam_name = $request->input('exam_name');
            $section = $request->input('section');
            $staff = $request->input('staff');
            $data=DB::select("SELECT * FROM `stafflist` WHERE `staffname`='$staff'");
            
                
                    $hii=json_encode($data);
                    $value= substr("$hii",1,-1);
                   
                   $tokenOutput2 = json_decode($value);
                  $staffid=$tokenOutput2->{'staffid'}; 

           $values = array('staff_name' => $staff,'staff_id' => $staffid,'hall' => $hall,'exam_name' => $exam_name,
           'section' => $section,'exam_date' => $date);

            return view('modulee')->with('values', $values);
            
            
            
            }  
            public function insestaff($module,$value){

             parse_str($value, $array);

             $array['value']['module'] = $module;

//print_r($array);
 $ttt=$array['value'];
//print_r($ttt);
           DB::connection('mysql2')->table('alert_exam_hall')->insert($ttt);
             
            return redirect('staff_alert')->with('alert', 'Successfully alerted');
                }  
            public function data_delete(Request $request){
                $id = $request->input('id');
                DB::connection('mysql2')->table('alert_exam_hall')->where('id', $id)->delete();
                return back()->with('alert1', 'Successfully deleted');

            }

            public function attendancc(Request $request){
                $section = $request->input('section');
return view('attendancc')->with('section',$section);

            }


            public function view_attt(Request $request){
                $section = $request->input('section');
                $Module = $request->input('Module');
                $data=DB::connection('mysql2')->select("select * from  `studentuser` where `SECTION`= '$section'");


    //print_r($data);
        return view('view_attt')->with('view',$data)->with('section',$section)->with('Module',$Module);
            }
            public function view_speal1()
            {
            return view('view_speal_pdf1');
            
            }
            public function spl_app(Request $request){
                $id = $request->input('id');
                $use = DB::connection('mysql2')->table('special_permission')->where('id', $id)->get();
                $hii=json_encode($use);
                $value= substr("$hii",1,-1);
               
               $tokenOutput2 = json_decode($value);
               $name=$tokenOutput2->{'name'};
               $regno=$tokenOutput2->{'regno'};
               $section=$tokenOutput2->{'section'};
               $staffname=$tokenOutput2->{'staffname'};
               $staffid=$tokenOutput2->{'staffid'};

               $data=DB::connection('mysql2')->select("select * from  `studentuser` where `REGNO`= '$regno'");

               $hii1=json_encode($data);
               $value1= substr("$hii1",1,-1);
              
              $tokenOutput21 = json_decode($value1);
              $BATCH=$tokenOutput21->{'BATCH'};
              $YOS=$tokenOutput21->{'YOS'};          
               

     $values = array('name' => $name,'regno' => $regno,'batch' => $BATCH,'yos' => $YOS,
     'amount' => '0','fine_details' => 'VOICE','section' =>  $section,'staffid' => $staffid,'status' => 'Done');
               DB::connection('mysql2')->table('student_fine')->insert($values);
               DB::connection('mysql2')->table('special_permission')->where(['id'=>$id])->update(array('status' => 'Done'));
  
               return back()->with('alert1', 'Approved!');

                
            }       
public function logout(){


session_unset();
session_destroy();
return view('welcome');

}
}
