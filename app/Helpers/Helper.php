<?php
namespace App\Helpers;
use DB;
use Illuminate\Http\Request;
use Auth;
use Log;
use App\Department;
use App\Designation;
use App\User;
use Carbon\Carbon;


class Helper{

	public static function checkDepartmentExist($dpt_name){
	$dpt_id = Department::where('department', $dpt_name)
			 ->select('id')
			 ->first();
	if(!empty($dpt_id)){
		return $dpt_id['id'];
	}
	else{
		$department = Department::create(['department' => $dpt_name, 'publication_status' => 1,
		        'created_by' => 1]);
			if(!empty($department)){
				return $department->id;
			}
	}
	}

	public static function checkDesignationExist($designation_name,$dpt_id){
		$des_id = Designation::where('designation', $designation_name)
			 ->select('id')
			 ->first();
	if(!empty($des_id)){
		return $des_id['id'];
	}
	else{
		$designation = Designation::create(['designation' => $designation_name,'department_id' => $dpt_id,'publication_status' => 1,'created_by' => 1]);
			if(!empty($designation)){
				return $designation->id;
			}
	}
	}

	public static function getGender($gender){
		if($gender == "Male"){
			return "m";
		}
		else{
			return "f";
		}
	}

	public static function getEmployementStatus($type){
		if($type == "Provision"){
			$value = 1;
			return $value;
		}
		elseif ($type == "Permanent") {
			$value = 2;
			return $value;
		}
		elseif ($type == "Full Time") {
			$value = 3;
			return $value;
		}
		elseif ($type == "Part Time") {
			$value = 4;
			return $value;
		}
		elseif ($type == "Adhoc") {
			$value = 5;
			return $value;
			}
		}

	public static function getMaritalStatus($type){
			if($type == "Married"){
			$value = 1;
			return $value;
		}
		elseif ($type == "Single") {
			$value = 2;
			return $value;
		}
		elseif ($type == "Divorced") {
			$value = 3;
			return $value;
		}
		elseif ($type == "Separated") {
			$value = 4;
			return $value;
		}
		elseif ($type == "Widowed") {
			$value = 5;
			return $value;
		}
	}

	public static function checkManager($mgr_emp_code,$mgr_name,$des,$dpt){
		$mgr_id = User::where('employee_id', $mgr_emp_code)
			 ->select('id')
			 ->first();
			 if(!empty($mgr_id)){
				return $mgr_id['id'];
			}
			else{

			$user = User::create(['employee_id' => $mgr_emp_code, 'name' => $mgr_name,
				'designation_id'    => $des,'joining_position'    => $dpt,
				 'password' => \Hash::make('12345678'), 'role' => 2,'created_by' => 1]);
			if(!empty($user)){
				return $user->id;
				}
			}
	}

	public static function checkEmployeeExist($emp_code){
		$mgr_id = User::where('employee_id', $emp_code)
			 ->select('id')
			 ->first();
			 if(!empty($mgr_id)){
				return false;
			}
			else{
				return true;
			}
	}

	public static function getUserIdByEmpCode($emp_code){
		$user_id = User::where('employee_id', $emp_code)
			 ->select('id')
			 ->first();
			 if(!empty($user_id)){
				return $user_id['id'];
			}
			else{
				return null;
			}
	}

	public static function floatNumberCal($no){
		$float_no= number_format((float)$no, 2, '.', '');
		return $float_no;
	}

	public static function getAttendanceDays($user_id,$month){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();
		$attendance = DB::table('attendances')->whereBetween('attendance_date', [$start_date,$end_date])->where('user_id', $user_id)->get();
		$result = count($attendance);
		return $result;
	}

	public static function getPresentDays($user_id,$month){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();
		$attds=  DB::table('attendances')->whereIn('attendance_status', [1,2,3])->where('user_id', $user_id)->whereBetween('attendance_date', [$start_date,$end_date])->get();
		$result = count($attds);
		return $result;
	}

	public static function getAbsentDays($user_id,$month){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();
		$abs=  DB::table('attendances')->where('attendance_status', 0)->where('user_id', $user_id)->whereBetween('attendance_date', [$start_date,$end_date])->get();
		$result = count($abs);
		return $result;
	}

	public static function getLOPDeduction($user_id,$month,$ctc){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();

		$attendance = DB::table('attendances')->whereBetween('attendance_date', [$start_date,$end_date])->where('user_id', $user_id)->get();
		$total = count($attendance);

		$abs=  DB::table('attendances')->where('attendance_status', 0)->where('user_id', $user_id)->whereBetween('attendance_date', [$start_date,$end_date])->get();
		$absent = count($abs);

		if($absent != 0){
			$per_day_val = $ctc/$total;
			$per_day =number_format((float)$per_day_val, 2, '.', '');
			$lop_deduction = $per_day * $absent;
			return $lop_deduction;
		}
		else{
			return 0;
		}
	}

	public static function getTotalDeduction($user_id,$month,$ctc,$deduction){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();

		$attendance = DB::table('attendances')->whereBetween('attendance_date', [$start_date,$end_date])->where('user_id', $user_id)->get();
		$total = count($attendance);

		$abs=  DB::table('attendances')->where('attendance_status', 0)->where('user_id', $user_id)->whereBetween('attendance_date', [$start_date,$end_date])->get();
		$absent = count($abs);

		if($absent != 0){
			$per_day_val = $ctc/$total;
			$per_day =number_format((float)$per_day_val, 2, '.', '');
			$lop_deduction = $per_day * $absent;
			$total_dedcution = $lop_deduction + $deduction;
			return $total_dedcution;
		}
		else{
			return $deduction;
		}

	}

		public static function getNetSalary($user_id,$month,$ctc,$deduction,$netsal){
		$mon=explode('-',$month);
		$month_no = $mon[1];
		$dt = Carbon::createFromFormat('m', $month_no);
		$start_date =$dt->startOfMonth()->toDateString();
		$end_date = $dt->endOfMonth()->toDateString();

		$attendance = DB::table('attendances')->whereBetween('attendance_date', [$start_date,$end_date])->where('user_id', $user_id)->get();
		$total = count($attendance);

		$abs=  DB::table('attendances')->where('attendance_status', 0)->where('user_id', $user_id)->whereBetween('attendance_date', [$start_date,$end_date])->get();
		$absent = count($abs);

		if($absent != 0){
			$per_day_val = $ctc/$total;
			$per_day =number_format((float)$per_day_val, 2, '.', '');
			$lop_deduction = $per_day * $absent;
			$pay_sal =$netsal - $lop_deduction;
			return $pay_sal;
		}
		else{
			return $netsal;
		}

	}
}