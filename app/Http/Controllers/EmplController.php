<?php

namespace App\Http\Controllers;

use App\Designation;
use App\Role;
use App\User;
use App\Department;
use DB;
use Illuminate\Http\Request;
use PDF;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Log;

class EmplController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('employee_id', 'users.id', 'users.name', 'users.contact_no_one', 'users.created_at', 'users.activation_status', 'designations.designation')
			->orderBy('users.employee_id', 'ASC')
			->get()
			->toArray();
		return view('administrator.people.employee.manage_employees', compact('employees'));
	}

	public function print() {
		$employees = User::query()
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->whereBetween('users.access_label', [2, 3])
			->where('users.deletion_status', 0)
			->select('users.id', 'users.employee_id', 'users.name', 'users.email', 'users.present_address', 'users.contact_no_one', 'designations.designation')
			->orderBy('users.id', 'DESC')
			->get()
			->toArray();
		return view('administrator.people.employee.employees_print', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();
		$managers = User::query()->get();
		

		return view('administrator.people.employee.add_employee', compact('designations', 'roles'))->with('managers',$managers); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//return $request;
		$url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		$employee = request()->validate([
			'employee_id' => 'required|max:250',
			'name' => 'required|max:100',
			'email' => 'required|email|unique:users|max:100',
			'contact_no_one' => 'required|max:20',
			'gender' => 'required',
		    'employee_type' => 'required',
			'date_of_birth' => 'required',
			'joining_date' => 'required',
			'designation_id' => 'required|numeric',
		    'joining_position' => 'required',
			'joining_position' => 'required',
			// 'role' => 'required',
            'manager' => 'required',
		], [
			'designation_id.required' => 'The designation field is required.',
			'contact_no_one.required' => 'The contact no field is required.',
			'name.regex' => 'No number is allowed.',
			'access_label' => 'The position field is required.',
		]);

		$result = User::create($employee + ['created_by' => auth()->user()->id, 'access_label' => 2, 'role'=>2,'password' => bcrypt(12345678)]);
		$inserted_id = $result->id;

		$result->attachRole(Role::where('name', 'employee')->first());

		if (!empty($inserted_id)) {
		    $manager = DB::table('managers')->insertGetId([
		        'manager_id' => $request->manager,
		        'user_id' => 	$inserted_id,
		        'created_by' => auth()->user()->id
		        ]);
		    return redirect('/people/employees/edit/'.$inserted_id)->with('message', 'Add successfully.');
		}
		return redirect('/people/employees/create')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function active($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Activate successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function deactive($id) {
		$affected_row = User::where('id', $id)
			->update(['activation_status' => 0]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Deactive successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//$employee_type = User::find($id)->toArray();
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();
		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();
		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();
		$departments = Department::where('deletion_status', 0)
			->select('id', 'department')
			->get();	
		return view('administrator.people.employee.show_employee', compact('employee', 'created_by', 'designations', 'departments'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function pdf($id) {
		$employee = DB::table('users')
			->join('designations', 'users.designation_id', '=', 'designations.id')
			->select('users.*', 'designations.designation')
			->where('users.id', $id)
			->first();

		$created_by = User::where('id', $employee->created_by)
			->select('id', 'name')
			->first();

		$designations = Designation::where('deletion_status', 0)
			->select('id', 'designation')
			->get();

		$pdf = PDF::loadView('administrator.people.employee.pdf', compact('employee', 'created_by', 'designations'));
		$file_name = 'EMP-' . $employee->id . '.pdf';
		return $pdf->download($file_name);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$employee = User::find($id)->toArray();
		$manager = DB::table('managers')->where('user_id',$id)->first();
		$designations = Designation::where('deletion_status', 0)
			->where('publication_status', 1)
			->orderBy('designation', 'ASC')
			->select('id', 'designation')
			->get()
			->toArray();
		$roles = Role::all();
		$users = User::query()->get();
		return view('administrator.people.employee.edit_employee', compact('employee', 'roles', 'designations'))->with('users',$users)->with('manager',$manager);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$employee = User::find($id);

		$url = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

		request()->validate([
		    'name' => 'required|max:100',
		    'contact_no_one' => 'required|max:20',
		    'gender' => 'required',
		    'employee_type' => 'required',
		    'date_of_birth' => 'required',
		    'joining_date' => 'required',
		    'designation_id' => 'required|numeric',
		    'joining_position' => 'required',
		    'joining_position' => 'required',
		    
		    'manager' => 'required',
		], [
			'designation_id.required' => 'The designation field is required.',
			'contact_no_one.required' => 'The contact no field is required.',
			'web.regex' => 'The URL format is invalid.',
			'name.regex' => 'No number is allowed.',
			'access_label' => 'The position field is required.',
		]);

		$employee->employee_id = $request->get('employee_id');
		$employee->name = $request->get('name');
		$employee->last_name = $request->get('last_name');
		$employee->father_name = $request->get('father_name');
		$employee->mother_name = $request->get('mother_name');
		$employee->spouse_name = $request->get('spouse_name');
		$employee->email = $request->get('email');
		$employee->contact_no_one = $request->get('contact_no_one');
		$employee->emergency_contact = $request->get('emergency_contact');
		$employee->web = $request->get('web');
		$employee->gender = $request->get('gender');
		$employee->date_of_birth = $request->get('date_of_birth');
		$employee->present_address = $request->get('present_address');
		$employee->permanent_address = $request->get('permanent_address');
		$employee->home_district = $request->get('home_district');
		$employee->academic_qualification = $request->get('academic_qualification');
		$employee->professional_qualification = $request->get('professional_qualification');
		$employee->experience = $request->get('experience');
		$employee->reference = $request->get('reference');
		$employee->joining_date = $request->get('joining_date');
		$employee->designation_id = $request->get('designation_id');
		$employee->joining_position = $request->get('joining_position');
		$employee->access_label = 2;
		$employee->marital_status = $request->get('marital_status');
		$employee->id_name = $request->get('id_name');
		$employee->id_number = $request->get('id_number');
		$employee->manager_id = $request->get('manager');
		$employee->employee_type = $request->get('employee_type');
		$employee->blood_group = $request->get('blood_group');
		$employee->pan_no = $request->get('pan_no');
		$employee->aadhar_no = $request->get('aadhar_no');
		$employee->passport = $request->get('passport');
		$employee->personal_email = $request->get('personal_email');
		$employee->emergency_name = $request->get('emergency_name');
		$employee->emergency_email = $request->get('emergency_email');
		$employee->bank_name = $request->get('bank_name');
		$employee->account_no = $request->get('account_no');
		$employee->ifsc_code = $request->get('ifsc_code');
		$employee->city = $request->get('city');
		$employee->role = 2;
		$affected_row = $employee->save();

		DB::table('role_user')
			->where('user_id', $id)
			->update(['role_id' => 2]);
		DB::table('managers')
		     ->where('user_id',$id)
		     ->update(['manager_id' => $request->input('manager')]);

		if (!empty($affected_row)) {
			return redirect('/people/employees/edit/'.$id)->with('message', 'Update successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$affected_row = User::where('id', $id)
			->update(['deletion_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/people/employees')->with('message', 'Delete successfully.');
		}
		return redirect('/people/employees')->with('exception', 'Operation failed !');
	}

	 public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request) 
    {
    	if ($request->hasFile('file')) {
    		$file = $request->file('file');
    	 $filename = $file->getClientOriginalName();
      	$extension = $file->getClientOriginalExtension();
      	 $valid_extension = array("csv");
      	 if(in_array(strtolower($extension),$valid_extension)){
      	 		$employee =Excel::import(new UsersImport,request()->file('file'));
          if(!empty($employee)){
          	return redirect('/people/employees')->with('message', 'Add successfully.');
          }
          else{
          		return redirect('/people/employees')->with('exception', 'Operation failed!');
          }
      	 }

      	 else{
      	 	return redirect('/people/employees')->with('exception', 'Operation failed! Please select a csv file');
      	 } 
    	}
    	else{
    		return redirect('/people/employees')->with('exception', 'Operation failed! Please select a csv file');
    	 
    }
    	}

    public function getDepartmentUser(Request $reqest){
    	$users = DB::table('users')->select('id','name')->where('joining_position',$reqest->department_id)->get();
    	return $users;
    }

}
