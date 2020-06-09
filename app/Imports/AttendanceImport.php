<?php
  
namespace App\Imports;
  
use App\User;
use App\Attendance;
Use Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Helper;
use DB;
use Illuminate\Http\Request;

  
class AttendanceImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {    
        $user_id = Helper::getUserIdByEmpCode($row['employee_id']);
        $attendance_date = $row['date'];
        $status = $row['status'];
        if( $status == 'P'){
            $attendance_status = 1;
        }
        elseif( $status == 'H'){
            $attendance_status = 2;
        }
        elseif ($status == 'EL' || $status == 'SL') {
           $attendance_status = 3;
        }
        else{
            $attendance_status = 0;
        }
        if($status == 'EL'){
            $leave_id = 2;
        }
        elseif($status == 'SL'){
             $leave_id = 1;
        }
        elseif ($status == 'A') {
             $leave_id = 3;
        }
        elseif($status == 'H'){
            $leave_id = 4;
        }
        else{
            $leave_id = 0;
        }
        if($user_id != null){
             Attendance::create([
                'created_by' => auth()->user()->id,
                'user_id' => $user_id,
                'attendance_date' => date("Y-m-d", strtotime($attendance_date)),
                'attendance_status' =>  $attendance_status,
                'leave_category_id' =>  $leave_id,
                'check_in' => $row['punch_in'],
                'check_out' => $row['punch_out'],
            ]);
        }
       
    }
}