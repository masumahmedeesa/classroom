<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class ScheduleController extends Controller
{
    public function index(){
        return view('Courses.schedule');
    }

    public function action(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            $day = Carbon::now()->format( 'l' );
            //echo $day;
            if($query!=''){
                $data = DB::table('wholeCourses')
                    ->Where('timeSpan','like','%'.$day.'%')
                    ->orWhere('sessionYear',$query)
                    ->get();
            }
            else{
                $data = DB::table('wholeCourses')
                    -> Where('timeSpan','like','%'.$day.'%')
                    -> orderBy('sessionYear','ASC')
                    -> get();
            }
            $total_data = $data->count();

            if($total_data>0){
                foreach ($data as $row){


                    $output.='<tr>'.
                        '<td>'.$row->sessionYear.'</td>'.
                        '<td>'.$row->courseName.'</td>'.
                        '<td>'.$row->courseCode.'</td>'.
                        '<td>'.$row->teacherName.'</td>'.
                        '<td>'.$row->credit.'</td>'.
                        '<td>'.$row->timeSpan.'</td>'.
                        '</tr>';
                }
//                    $output='
//
//
//                    <tr>
//                         <td>'.$row->sessionYear.'</td>
//                         <td>'.$row->courseName.'</td>
//                         <td>'.$row->courseCode.'</td>
//                         <td>'.$row->teacherName.'</td>
//                         <td>'.$row->credit.'</td>
//                         <td>'.$row->day.'</td>
//                         <td>'.$row->timeSpan.'</td>
//                    </tr>
//                    ';
                //}

            }
            else{
                $output = '
                    <tr>
                        <td align="center" colspan="7" style="color: Red;"> No Match FOUND !</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_data
            );

            echo json_encode($data);
        }
    }
}
