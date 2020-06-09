<?php
  
namespace App\Imports;
  
use App\User;
Use Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Helper;
use DB;
use Illuminate\Http\Request;

  
class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        $emp = Helper::checkEmployeeExist($row['employee_code']);
        $dpt = Helper::checkDepartmentExist($row['department']);
        $des = Helper::checkDesignationExist($row['designation'],$dpt);
        $mgr_id = Helper::checkManager($row['reporting_manager_employee_code'],
            $row['reporting_manager'],$des,$dpt);
        $employee_type = Helper::getEmployementStatus($row['employement_status']);
        $marital_status = Helper::getMaritalStatus($row['marital_status']);
        $gender = Helper::getGender($row['gender']);
        $doj = $row['doj'];
        $dob = $row['dob'];
        $gross = $row['gross_salary'];
      if($emp == true){
        $user =  User::create([
            'employee_id' => $row['employee_code'],
            'name'     => $row['first_name'],
            'last_name' => $row['last_name'],
            'father_name' => $row['father_name'],
            'mother_name' => $row['mother_name'],
            'spouse_name' => $row['spouse_name'],
            'email'    => $row['email'],
            'present_address'    => $row['present_address'],
            'permanent_address'    => $row['permanent_address'],
            'joining_date'    => date("Y-m-d", strtotime($doj)),
            'contact_no_one'    => $row['contact_no'],
            'emergency_contact'    => $row['emergency_contact'],
            'gender'    => $gender,
            'date_of_birth'    => date("Y-m-d", strtotime($dob)),
            'marital_status'    => $marital_status,
            'designation_id'    => $des,
            'joining_position'    => $dpt,
            'manager_id'    => $mgr_id,
            'employee_type'    => $employee_type,
            'blood_group'    => $row['blood_group'],
            'pan_no'    => $row['pan_no'],
            'aadhar_no'    => $row['aadhar_no'],
            'passport'    => $row['passport_no'],
            'personal_email'    => $row['personal_email'],
            'emergency_name'    => $row['emergency_contact_name'],
            'emergency_email'    => $row['emergency_email'],
            'bank_name'    => $row['bank_name'],
            'account_no'    => $row['account_no'],
            'ifsc_code'    => $row['ifsc_code'],
            'city'    => $row['city'],
            'role'    => 2,
            'access_label' => 2,
            'created_by' => 1,
            'password' => \Hash::make('12345678'),
        ]);

       if (!empty($user)) {
            $manager = DB::table('managers')->insertGetId([
                'manager_id' => $mgr_id,
                'user_id' =>    $user->id,
                'created_by' => auth()->user()->id
                ]);
            if(!empty($gross)){
               $basic_val = $gross/2;    
            $basic = Helper::floatNumberCal($basic_val);
            $hra_val = $basic * 0.40;
            $hra = Helper::floatNumberCal($hra_val);
            $special = $basic - $hra;
            if($basic < 15000){
                $emp_pf_val = $basic * 0.12;
                $emp_pf = Helper::floatNumberCal($emp_pf_val);
                $empr_pf_val = $basic * 0.13;
                $empr_pf = Helper::floatNumberCal($empr_pf_val);
            }
            else{
                $emp_pf_val = 15000 * 0.12;
                $emp_pf = Helper::floatNumberCal($emp_pf_val);
                $empr_pf_val = 15000 * 0.13;
                $empr_pf = Helper::floatNumberCal($empr_pf_val);
            }
            if($gross < 15000){
                $pt = 0;
            }
            else{
                $pt = 200;
            }
            if($gross <= 21000){
                $emp_esi_val = $gross * 0.0075;
                $emp_esi = Helper::floatNumberCal($emp_esi_val);
                $empr_esi_val = $gross * 0.0325;
                $empr_esi = Helper::floatNumberCal($empr_esi_val);
            }
            else{
                $emp_esi = 0;
                $empr_esi = 0;
            }
            $net_sal = $gross - $emp_pf - $pt - $emp_esi;
            $total_deduction = $emp_pf + $pt + $emp_esi;
            $grand_ctc = $gross + $empr_esi + $empr_pf;

            $manager = DB::table('payrolls')->insertGetId([
                'user_id' =>    $user->id,
                'employee_type' => $employee_type,
                'basic_salary' => $basic,
                'house_rent_allowance' => $hra,
                'special_allowance' => $special,
                'employee_esi' => $emp_esi,
                'employeer_esi' => $empr_esi,
                'employee_pf' => $emp_pf,
                'employeer_pf' => $empr_pf,
                'gross_salary' => $grand_ctc,
                'total_deduction' => $total_deduction,
                'net_salary' => $net_sal,
                'ctc' => $gross,
                'created_by' => auth()->user()->id
                ]); 
            }
        }
      }   
    }
}